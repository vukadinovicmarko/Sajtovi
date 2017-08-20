using MilankovDeo.DataLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MilankovDeo.BusinessLayer
{
    public abstract class OpFilmoviBase : Operation
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();
            Filmovi[] niz =
                (
                    from item in entiteti.Filmovis
                    orderby item.Ocena ascending
                    select item
                ).ToArray();
            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;
        }

        public Filmovi PropertiFilmovi { get; set; }

    }

    public class OpFilmoviSelect : OpFilmoviBase
    {
        //public override OperationObject execute(aspLab2015Entities entities)
        //{
        //    Filmovi[] niz =
        //        (
        //            from item in entities.Filmovis
        //            select item
        //        ).ToArray();
        //    OperationObject rezultat = new OperationObject();
        //    rezultat.Niz = niz;
        //    rezultat.Success = true;
        //    return rezultat;

        //}
       
    }


    public class OpFilmoviSelectWhereId : OpFilmoviSlozeniSelect
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();
            Filmovi[] niz =
                (
                    from item in entiteti.Filmovis
                    where item.IdFilma == this.PropertiFilmovi.IdFilma
                    select item
                   

                ).ToArray();

            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;
        }
    }


    public class OpFilmoviSlozeniSelect : OpFilmoviBase
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();
            FilmoviDbItemSlozenaSelekcija[] niz =
                (
                    from item in entiteti.Filmovis
                    join bioskop in entiteti.Bioskopis
                    on item.IdBioskopa equals bioskop.IdBioskopa
                    select new FilmoviDbItemSlozenaSelekcija
                        {
                            IdFilma = item.IdFilma,
                            NazivFilma = item.NazivFilma,
                            NazivBioskopa = bioskop.NazivBioskopa,
                            OpisFilma = item.OpisFilma,
                            OcenaFilma = item.Ocena,
                            PutanjaSlikeFilma = item.PutanjaDoSlike,
                            ZanroviFilma = item.Zanrovi,
                            DatumPostavljanja = item.DatumPostavljanja,
                            Korisnik = item.Korisnik
                        }
                ).ToArray();

            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;

        }

        

    }

    public class OpFilmoviUpdate : OpFilmoviSlozeniSelect
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();
            if (this.PropertiFilmovi != null)
            {
                entiteti.FilmoviUpdate
                    (
                        this.PropertiFilmovi.IdFilma,
                        this.PropertiFilmovi.NazivFilma,
                        this.PropertiFilmovi.IdBioskopa,
                        this.PropertiFilmovi.OpisFilma,
                        this.PropertiFilmovi.Ocena,
                        DateTime.Now,
                       this.PropertiFilmovi.PutanjaDoSlike,
                        this.PropertiFilmovi.Zanrovi,
                        this.PropertiFilmovi.Korisnik
                    );
            }
            return base.execute(entiteti);
        }
    }

    public class OpFilmoviDelete : OpFilmoviSlozeniSelect
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();
            entiteti.FilmoviDelete
                (
                    this.PropertiFilmovi.IdFilma
                );
            return base.execute(entities);
        }
    }


    public class OpFilmoviInsert : OpFilmoviSlozeniSelect
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();
            entiteti.FilmoviInsert
                (

                    this.PropertiFilmovi.NazivFilma,
                    this.PropertiFilmovi.IdBioskopa,
                    this.PropertiFilmovi.OpisFilma,
                    this.PropertiFilmovi.Ocena,
                    this.PropertiFilmovi.DatumPostavljanja,
                    this.PropertiFilmovi.PutanjaDoSlike,
                    this.PropertiFilmovi.Zanrovi,
                    this.PropertiFilmovi.Korisnik
                    
                );
            return base.execute(entiteti);
        }
    }

    public class FilmoviDbItemSlozenaSelekcija
    {
        public int IdFilma { get; set; }
        public string NazivFilma { get; set; }
        public string NazivBioskopa { get; set; }
        public string OpisFilma { get; set; }
        public int OcenaFilma { get; set; }
        public string PutanjaSlikeFilma { get; set; }
        public string ZanroviFilma { get; set; }
        public DateTime DatumPostavljanja { get; set; }
        public string Korisnik { get; set; }
    }

}
