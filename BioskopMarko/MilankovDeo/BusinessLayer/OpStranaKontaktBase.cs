using MilankovDeo.DataLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MilankovDeo.BusinessLayer
{
    public class OpStranaKontaktBase : Operation
    {

        public override OperationObject execute(DataLayer.aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();
            StranaKontakt[] niz =
               (
                    from item in entiteti.StranaKontakts
                    select item
               ).ToArray();

            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;

        }

        public StranaKontakt PropertiStranaKontakt { get; set; }


    }


    public class OpStranaKontaktSelectWhereAktivan : OpStranaKontaktBase
    {
        public override OperationObject execute(DataLayer.aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();
            StranaKontakt[] niz =
               (
                    from item in entiteti.StranaKontakts
                    where item.StatusStraneKontakt == 0
                    select item
               ).ToArray();

            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;

        }
    }
    public class OpStranaKontaktSelectWhereId : OpStranaKontaktBase
    {
        public override OperationObject execute(DataLayer.aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();
            StranaKontakt[] niz =
               (
                    from item in entiteti.StranaKontakts
                    where item.IdStraneKontakt == PropertiStranaKontakt.IdStraneKontakt
                    select item
               ).ToArray();

            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;

        }
    }

    public class OpStranaKontaktSlozeniSelect : OpStranaKontaktBase
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            OpStranaKontaktSlozenaSelekcija[] niz =
               (
                    from item in entities.StranaKontakts
                    join bioskopi in entities.Bioskopis
                    on PropertiStranaKontakt.Bioskopi equals bioskopi.NazivBioskopa
                    select new OpStranaKontaktSlozenaSelekcija
                    {
                        Bioskopi = bioskopi.NazivBioskopa,
                        NaslovStraneKontakt = item.NaslovStraneKontakt,
                        NazivStraneKontakt = item.NazivStraneKontakt,
                        TekstStraneKontakt = item.TekstStraneKontakt
                    }
               ).ToArray();

            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;
        }
    }

    public class OpStranaKontaktUpdate : OpStranaKontaktSlozeniSelect
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();
            entiteti.StranaKontaktUpdate
                (
                    this.PropertiStranaKontakt.IdStraneKontakt,
                    this.PropertiStranaKontakt.NazivStraneKontakt,
                    this.PropertiStranaKontakt.NaslovStraneKontakt,
                    this.PropertiStranaKontakt.TekstStraneKontakt,
                    this.PropertiStranaKontakt.Bioskopi,
                    this.PropertiStranaKontakt.Korisnik,
                    this.PropertiStranaKontakt.DatumIzmene
                   
                );

            return base.execute(entiteti);
        }


    }

    public class OpStranaKontaktSlozenaSelekcija
    {
        public int IdStraneKontakt { get; set; }
        public string NazivStraneKontakt { get; set; }
        public string NaslovStraneKontakt { get; set; }
        public string TekstStraneKontakt { get; set; }
        public string Bioskopi { get; set; }
        public string Korisnik { get; set; }
        public System.DateTime DatumPostavljanja { get; set; }
        public System.DateTime DatumIzmene { get; set; }
        public Nullable<int> StatusStraneKontakt { get; set; }
    }
}
