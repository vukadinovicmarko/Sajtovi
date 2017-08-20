using MilankovDeo.DataLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MilankovDeo.BusinessLayer
{
    public class OpGalerijaBase : Operation
    {
        //public Slike Slika { get; set; }

        //protected OpGalerijaBase()
        //{
           
        //}

        //public override OperationObject execute(aspLab2015Entities entities)
        //{
        //    Slike[] slike
        //         = (
        //         from slika in entities.Slikes
        //         select slika).ToArray();

        //    OperationObject opObj = new OperationObject();
        //    opObj.Niz = slike;
        //    opObj.Success = true;
        //    return opObj;
        //}
        public override OperationObject execute(aspLab2015Entities entities)
        {
            throw new NotImplementedException();
        }
        public MilankovDeo.DataLayer.Galerija PropertyGalerija { get; set; }
        
    }

    //public class OpGalerijaDelete : OpGalerijaBase
    //{
    //    public override OperationObject execute(aspLab2015Entities entities)
    //    {
           

    //        if (this.Slika.IdSlike != 0)
    //        {
    //            entities.SlikeDelete(this.Slika.IdSlike);
    //        }


    //        OperationObject opObj = base.execute(entities);
    //        opObj.AktuelniID = this.Slika.IdSlike;
    //        return opObj;
    //    }
    //}
    //public class OpGalerijaSelect : OpGalerijaBase
    //{

        //private int maxPoStrani;

        //public int MaxPoStrani
        //{
        //    get { return maxPoStrani; }
        //    set { maxPoStrani = value; }
        //}

        //private int strana = -1;

        //public int Strana
        //{
        //    get { return strana; }
        //    set { strana = value; }
        //}

        //public override OperationObject execute(aspLab2015Entities entities)
        //{
        //    if (this.Strana == -1 || this.maxPoStrani < 0)
        //    {
        //        return base.execute(entities);
        //    }
        //    else
        //    {
               
                

               

        //        System.Data.Objects.ObjectParameter ukupanBrojSlika = new System.Data.Objects.ObjectParameter("ukupanBrojSlika", System.Type.GetType("System.Int32"));




        //        SlikeStranicenje_Result[] slike = entities.SlikeStranicenje(this.maxPoStrani, this.strana, this.Slika.IdGalerije,ukupanBrojSlika).Reverse().ToArray();


        //        OpObjGalerija opObj = new OpObjGalerija();
        //        opObj.Niz = slike;
        //        opObj.ukupanBrojSlika = (int)ukupanBrojSlika.Value;
        //        opObj.Success = true;
        //        return opObj;
        //    }
        //}
    


    //public class OpObjGalerija : OperationObject
    //{
    //    public int ukupanBrojSlika { get; set; }
    //}


    public class OpGalerijeSelect : Operation
    {

        public override OperationObject execute(aspLab2015Entities entities)
        {
            Slike [] niz = 
                (
                    from slika in entities.Slikes
                    
                    select slika
                ).ToArray();

            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;
        }
    }


    public class OpIzborGalerijeSelect : OpGalerijaBase
    {

        public override OperationObject execute(aspLab2015Entities entities)
        {

            aspLab2015Entities entiteti = new aspLab2015Entities();

            MilankovDeo.DataLayer.Galerija[] niz =
                            (
                                from galerija in entiteti.Galerijas
                                select galerija
                            ).ToArray();

            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;


        }
    }
    public class OpGalerijaSelectWithId : OpGalerijaBase
    {

        public override OperationObject execute(aspLab2015Entities entities)
        {

            aspLab2015Entities entiteti = new aspLab2015Entities();

            MilankovDeo.DataLayer.Galerija[] niz =
                            (
                                from galerija in entiteti.Galerijas
                                where galerija.IdGalerije == PropertyGalerija.IdGalerije
                                select galerija
                            ).ToArray();

            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;

           
        }
        
    }




    public class OpGalerijaUpdate : OpIzborGalerijeSelect
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();
            entiteti.GalerijaUpdate  
                (
                    this.PropertyGalerija.IdGalerije,
                    this.PropertyGalerija.NazivGalerije,
                    this.PropertyGalerija.PutanjaDoSlike,
                    this.PropertyGalerija.Korisnik,
                    this.PropertyGalerija.DatumIzmene
                );

            return base.execute(entiteti);
        }


    }

    public class OpGalerijaInsert : OpIzborGalerijeSelect
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();
            entiteti.GalerijaInsert
                (
                    this.PropertyGalerija.NazivGalerije,
                    this.PropertyGalerija.PutanjaDoSlike,
                    this.PropertyGalerija.Korisnik,
                    this.PropertyGalerija.DatumPostavljanja,
                    this.PropertyGalerija.DatumIzmene
                );

            return base.execute(entiteti);
        }


    }

    public class OpGalerijaDelete : OpIzborGalerijeSelect
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();
            entiteti.GalerijaDelete
                (
                    this.PropertyGalerija.IdGalerije
                );
            return base.execute(entities);
        }
    }


    public class OpGalerijaSlozeniSelect
    {
        public int IdGalerije { get; set; }
        public string NazivGalerije { get; set; }
        public string PutanjaDoSlike { get; set; }
        public string Korisnik { get; set; }
        public Nullable<System.DateTime> DatumPostavljanja { get; set; }
        public Nullable<System.DateTime> DatumIzmene { get; set; }
       

    }
    
}
