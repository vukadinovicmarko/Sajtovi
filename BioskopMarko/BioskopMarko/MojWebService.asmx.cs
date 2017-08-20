using MilankovDeo.BusinessLayer;
using MilankovDeo.DataLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Script.Serialization;
using System.Web.Services;

namespace BioskopMarko
{
    /// <summary>
    /// Summary description for MojWebService
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
    [System.Web.Script.Services.ScriptService]
    public class MojWebService : System.Web.Services.WebService
    {

        [WebMethod]
        public string HelloWorld()
        {
            return "Hello World";
        }

        [WebMethod] //ovako mora da postavis da bi mogao da pozoves preko ajaxa
        public string ajaxMetoda(string tekst)
        {
            return tekst;
        }


        [WebMethod]
        public string izbrisiSliku(string idSlike)
        {
            //var jsonOsoba = new JavaScriptSerializer().Serialize(o);
            ////lista ,Dictionary sve ima moguccnost serijalziacije
            ////Osoba isto mora da bude Seriazable da xD da bi se mogla proslediti ovdje kao argument gore

            //return jsonOsoba;


            OpSlikeDelete op = new OpSlikeDelete();


            op.Slika = new Slike { IdSlike = Int32.Parse(idSlike) };
            OperationObject opObj = OperationManager.Singleton.executeOp(op);
            Slike[] niz = (Slike[])opObj.Niz;


            //MasterOfPuppets master = (MasterOfPuppets)this.Master;
            //master.ispisPoruka(String.Format("Uspesno ste izbrisali sliku iz galerije pod rednim brojem {0}", opObj.aktuelniID.ToString()), "successIspis");


            string text = String.Format("Uspesno ste izbrisali sliku iz galerije pod rednim brojem {0}", idSlike);



            return text;

        }


        
        
        [WebMethod]
        public string Glasaj(string idAnkete,string idStavke)
        {

            HttpCookie kolacic = HttpContext.Current.Request.Cookies["anketaGlasanje" + idAnkete];
            if (kolacic == null)
            {


                kreirajKolacic(idAnkete);


             
                    
                OpAnketaGlasanje op = new OpAnketaGlasanje();
                op.anketaDataSelect = new AnketaStavkeDbItem
                {
                    Id_ankete = Int32.Parse(idAnkete),
                    Id_stavke = Int32.Parse(idStavke)
                };

                OperationObject glasano = OperationManager.Singleton.executeOp(op);

                if(glasano.Success)
                {
                    return "hvala na glasanju";
                }
                else
                {
                    return "doslo je do greske probajte opet";
                }
                

            }
            else
                return "vec ste glasali";
        }

        [WebMethod]
        public string rezultatAnkete(string idAnkete,string idStavke)
        {

            OpAnketaSelect prikazOp = new OpAnketaSelect();
            prikazOp.anketaDataSelect = new AnketaStavkeDbItem
            {
                Id_ankete = Int32.Parse(idAnkete),
                Id_stavke = Int32.Parse(idStavke)
            };

            OperationObject rezultatGlasanja = OperationManager.Singleton.executeOp(prikazOp);

            AnketaStavkeDbItem[] infoOGlasanju = rezultatGlasanja.Niz as AnketaStavkeDbItem[];

            return new JavaScriptSerializer().Serialize(infoOGlasanju);
        }

        [WebMethod]
        protected void kreirajKolacic(string idAnkete)
        {
            HttpCookie mojKolacic = new HttpCookie("anketaGlasanje" + idAnkete);
            mojKolacic["naziv"] = "AnketaBioskop "+idAnkete+", hvala na glasanju";
            mojKolacic.Expires = DateTime.Now.AddDays(31);
            mojKolacic.Domain = "localhost";
            HttpContext.Current.Response.Cookies.Add(mojKolacic);
            
        }

    }
        

        



    
}
