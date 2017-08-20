using MilankovDeo.DataLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MilankovDeo.BusinessLayer
{
    public class OpSlikeBase :Operation
    {
        public Slike Slika { get; set; }

        
        public override OperationObject execute(aspLab2015Entities entities)
        {
            Slike[] slike
                 = (
                 from slika in entities.Slikes
                 select slika).ToArray();

            OperationObject opObj = new OperationObject();
            opObj.Niz = slike;
            opObj.Success = true;
            return opObj;
        }
    }


    public class OpSlikeDelete : OpSlikeBase
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {


            if (this.Slika.IdSlike != 0)
            {
                entities.SlikeDelete(this.Slika.IdSlike);
            }


            OperationObject opObj = base.execute(entities);
            opObj.AktuelniID = this.Slika.IdSlike;
            return opObj;
        }
    }

    public class OpSlikeSelect : OpSlikeBase
    {
        private int maxPoStrani;

        public int MaxPoStrani
        {
            get { return maxPoStrani; }
            set { maxPoStrani = value; }
        }

        private int strana = -1;

        public int Strana
        {
            get { return strana; }
            set { strana = value; }
        }

        public override OperationObject execute(aspLab2015Entities entities)
        {
            if (this.Strana == -1 || this.maxPoStrani < 0)
            {
                return base.execute(entities);
            }
            else
            {





                System.Data.Objects.ObjectParameter ukupanBrojSlika = new System.Data.Objects.ObjectParameter("ukupanBrojSlika", System.Type.GetType("System.Int32"));




                SlikeStranicenje_Result[] slike = entities.SlikeStranicenje(this.maxPoStrani, this.strana, this.Slika.IdGalerije, ukupanBrojSlika).Reverse().ToArray();


                OpObjSlike opObj = new OpObjSlike();
                opObj.Niz = slike;
                opObj.ukupanBrojSlika = (int)ukupanBrojSlika.Value;
                opObj.Success = true;
                return opObj;
            }
        }
    }

    public class OpObjSlike : OperationObject
    {
        public int ukupanBrojSlika { get; set; }
    }


    public class OpSlikeWhereId : Operation
    {

        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();

            Slike[] niz =
                            (
                                from slika in entiteti.Slikes
                                where slika.IdGalerije == Slike.IdGalerije
                                select slika
                            ).ToArray();

            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;
        }
        public Slike Slike { get; set; }
    }
    public class OpSlikeWhereIdSlike : Operation
    {

        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();

            Slike[] niz =
                            (
                                from slika in entiteti.Slikes
                                where slika.IdSlike == Slike.IdSlike
                                select slika
                            ).ToArray();

            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;
        }
        public Slike Slike { get; set; }
    }

    public class OpSlikeUpdate : OpSlikeSlozeniSelectWhereId
    {
        
            public override OperationObject execute(aspLab2015Entities entities)
            {
                aspLab2015Entities entiteti = new aspLab2015Entities();
                if (this.Slika != null)
                {
                    entiteti.SlikeUpdate
                        (
                            this.Slika.IdSlike,
                            this.Slika.NazivSlike,
                            this.Slika.PutanjaDoSlike,
                            this.Slika.IdGalerije,
                            this.Slika.Korisnik,
                            this.Slika.DatumIzmene
                           
                            
                        );
                }
                return base.execute(entiteti);
            }

            
        
    }

    public class OpSlikeInsert : OpSlikeSlozeniSelectWhereId
    {

        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();
            if (this.Slika != null)
            {
                entiteti.SlikeInsert
                    (
                        this.Slika.NazivSlike,
                        this.Slika.PutanjaDoSlike,
                        this.Slika.IdGalerije,
                        this.Slika.DatumPostavljanja,
                        this.Slika.Korisnik,
                        this.Slika.DatumIzmene
                        


                    );
            }
            return base.execute(entiteti);
        }



    }
    

    public class OpSlikeSlozeniSelectWhereId : OpSlikeBase
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();

            OpSlikeDbItemSlozenaSelekcija[] niz = 
                (
                    from item in entiteti.Slikes
                    join galerija in entiteti.Galerijas
                    on item.IdGalerije equals galerija.IdGalerije
                    where item.IdGalerije == Slika.IdGalerije
                    select new OpSlikeDbItemSlozenaSelekcija
                    {
                        IdSlike = item.IdSlike,
                        NazivSlike = item.NazivSlike,
                        PutanjaDoSlike = item.PutanjaDoSlike,
                        NazivGalerije = galerija.NazivGalerije,
                        Korisnik = item.Korisnik,
                        DatumPostavljanja = item.DatumPostavljanja,
                        DatumIzmene = item.DatumIzmene
                    }
                ).ToArray();

            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;

        }
    }



    public class OpSlikeDbItemSlozenaSelekcija
    {
        public int IdSlike { get; set; }
        public string NazivSlike { get; set; }
        public string PutanjaDoSlike { get; set; }
        public int IdGalerije { get; set; }
        public System.DateTime DatumPostavljanja { get; set; }
        public string Korisnik { get; set; }
        public System.DateTime DatumIzmene { get; set; }
        public string NazivGalerije { get; set; }
    }

}
