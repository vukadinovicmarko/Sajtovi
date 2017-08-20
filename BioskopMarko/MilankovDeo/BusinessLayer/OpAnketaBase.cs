using MilankovDeo.DataLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MilankovDeo.BusinessLayer
{
    public class OpAnketaBase:Operation
    {
        public AnketaStavkeDbItem anketaDataSelect { get; set; } 


        public override OperationObject execute(DataLayer.aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();
            AnketaStavkeDbItem[] ankete
               = (
               from anketa in entiteti.anketes
               join stavka in entiteti.stavkes
               on anketa.Id_ankete equals stavka.id_ankete
               orderby anketa.Id_ankete ascending
               select new AnketaStavkeDbItem
               {
                   broj_glasova = stavka.broj_glasova,
                   odgovor = stavka.odgovor,
                   Id_stavke = stavka.Id_stavke,
                   Id_ankete = anketa.Id_ankete,
                   naziv_ankete = anketa.naziv_ankete

               }).ToArray();





            OperationObject opObj = new OperationObject();
            opObj.Niz = ankete;
            opObj.Success = true;
            return opObj;
        }
    }

    public class OpAnketaSelect : OpAnketaBase
    {

        public override OperationObject execute(aspLab2015Entities entities)
        {

            aspLab2015Entities entiteti = new aspLab2015Entities();

            if (this.anketaDataSelect == null)
            {

                return base.execute(entiteti);
            }

            else
            {
               

                AnketaStavkeDbItem[] ankete
                    = (
                    from anketa in entiteti.anketes
                    join stavka in entiteti.stavkes
                    on anketa.Id_ankete equals stavka.id_ankete
                    where anketa.Id_ankete == this.anketaDataSelect.Id_ankete
                    orderby anketa.Id_ankete ascending
                    select new AnketaStavkeDbItem
                    {
                        broj_glasova = stavka.broj_glasova,
                        odgovor = stavka.odgovor,
                        Id_stavke = stavka.Id_stavke,
                        Id_ankete = anketa.Id_ankete,
                        naziv_ankete = anketa.naziv_ankete

                    }).ToArray();





                OperationObject opObj = new OperationObject();
                opObj.Niz = ankete;
                opObj.Success = true;
                return opObj;
            }
        }

      



    }



    public class OpSamoAnketaBase : Operation
    {

        public ankete anketaData { get; set; }

        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();

            ankete[] ankete
                = (
                from anketa in entiteti.anketes

                select anketa).ToArray();





            OperationObject opObj = new OperationObject();
            opObj.Niz = ankete;
            opObj.Success = true;
            return opObj;
        }
    }

    public class OpSamoAnketaSelect : OpSamoAnketaBase
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            if (this.anketaData == null)
            {
                return base.execute(entities);
            }
            else
            {
                aspLab2015Entities entiteti = new aspLab2015Entities();

                ankete[] ankete
                    = (
                    from anketa in entiteti.anketes
                    where anketa.Id_ankete == this.anketaData.Id_ankete
                    select anketa).ToArray();


                OperationObject opObj = new OperationObject();
                opObj.Niz = ankete;
                opObj.Success = true;
                return opObj;
            }
        }
    }

    public class OpSamoAnketaDelete : OpSamoAnketaBase
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();

            if (this.anketaData != null)
            {

                entiteti.AnketaDelete(this.anketaData.Id_ankete);

            }


            OperationObject opObj = base.execute(entities);
            return opObj;
        }
    }


    public class OpSamoAnketaInsert : OpSamoAnketaBase
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();

            if (this.anketaData != null)
            {

                entiteti.AnketaInsert(this.anketaData.naziv_ankete);

            }


            OperationObject opObj = base.execute(entiteti);
            return opObj;
        }
    }


    public class OpSamoAnketaUpdate : OpSamoAnketaBase
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();

            if (this.anketaData != null)
            {

                entiteti.AnketaUpdate(this.anketaData.Id_ankete, this.anketaData.naziv_ankete);

            }


            OperationObject opObj = base.execute(entiteti);
            return opObj;
        }
    }

    public class AnketaStavkeDbItem
    {
        public int Id_ankete { get; set; }
        public string naziv_ankete { get; set; }
        public int Id_stavke { get; set; }
        public string odgovor { get; set; }
        public int? broj_glasova { get; set; }

    }





    //stavke


    public class OpAnketaStavkaSelect : OpAnketaBase
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            if (this.anketaDataSelect == null)
            {

                return base.execute(entities);
            }

            else
            {
                aspLab2015Entities entiteti = new aspLab2015Entities();

                AnketaStavkeDbItem[] ankete
                    = (
                    from anketa in entiteti.anketes
                    join stavka in entiteti.stavkes
                    on anketa.Id_ankete equals stavka.id_ankete
                    where anketa.Id_ankete == this.anketaDataSelect.Id_ankete
                    && stavka.Id_stavke == this.anketaDataSelect.Id_stavke
                    orderby anketa.Id_ankete ascending
                    select new AnketaStavkeDbItem
                    {
                        broj_glasova = stavka.broj_glasova,
                        odgovor = stavka.odgovor,
                        Id_stavke = stavka.Id_stavke,
                        Id_ankete = anketa.Id_ankete,
                        naziv_ankete = anketa.naziv_ankete

                    }).ToArray();





                OperationObject opObj = new OperationObject();
                opObj.Niz = ankete;
                opObj.Success = true;
                return opObj;
            }
        }
    }

    public class OpStavkeDelete : OpAnketaSelect
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();

            if (this.anketaDataSelect != null)
            {
                entiteti.StavkeDelete(this.anketaDataSelect.Id_ankete, this.anketaDataSelect.Id_stavke);
            }


            OperationObject opObj = base.execute(entiteti);
            return opObj;
        }
    }

    public class OpStavkeUpdate : OpAnketaSelect
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();

            if (this.anketaDataSelect != null)
            {
                entiteti.StavkeUpdate(this.anketaDataSelect.Id_ankete, this.anketaDataSelect.Id_stavke, this.anketaDataSelect.odgovor, this.anketaDataSelect.broj_glasova.ToString());
            }


            OperationObject opObj = base.execute(entities);
            return opObj;
        }
    }
    public class OpAnketaInsert : OpAnketaSelect
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();

            if (this.anketaDataSelect != null)
            {
                entiteti.StavkeInsert(this.anketaDataSelect.Id_ankete, this.anketaDataSelect.odgovor);
            }


            OperationObject opObj = base.execute(entities);
            return opObj;
        }
    }
    //glasanje


    public class OpAnketaGlasanje : OpAnketaBase
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            if (this.anketaDataSelect == null)
            {
                return base.execute(entities);

            }
            else
            {

                aspLab2015Entities entiteti = new aspLab2015Entities();


                entiteti.AnketaGlasanje(this.anketaDataSelect.Id_ankete, this.anketaDataSelect.Id_stavke);

                OperationObject opObj = new OperationObject();
                opObj.Success = true;
                return opObj;

            }
        }
    }
}
