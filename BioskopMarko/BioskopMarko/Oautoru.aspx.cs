using MilankovDeo.BusinessLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;

namespace BioskopMarko
{
    public partial class Oautoru : System.Web.UI.Page
    {



        public List<int> nizidAnketa = new List<int>();

        public void NapuniAnkete(int idAnkete)
        {


            if (nizidAnketa.Count == 0)
                nizidAnketa.Add(idAnkete);

            for (int i = 0; i < nizidAnketa.Count; i++)
            {
                if (idAnkete == nizidAnketa[i])
                {
                    return;
                }
            }
            nizidAnketa.Add(idAnkete);

            return;
        }



        public void PrikaziAnkete(AnketaStavkeDbItem[] ankete)
        {


            for (int i = 0; i < ankete.Length; i++)
            {

                NapuniAnkete(ankete[i].Id_ankete);
            }





            List<RadioButtonList> lista = new List<RadioButtonList>();
            List<string> listaNaslovaAnketa = new List<string>();

            int start = 0;
            int j = 0;
            for (int i = 0; i < nizidAnketa.Count; i++)
            {

                RadioButtonList radioButtonList1 = new RadioButtonList();

                for (j = start; j < ankete.Length; j++)
                {
                    if (ankete[j].Id_ankete == nizidAnketa[i])
                    {

                        ListItem l1 = new ListItem();
                        l1.Text = ankete[j].odgovor;
                        l1.Value = ankete[j].Id_stavke.ToString() + "," + ankete[j].Id_ankete.ToString();

                        radioButtonList1.Items.Add(l1);
                    }
                    else
                    {

                        break;
                    }



                }

                //zato sto je niz uredjen tako da cim krene druga anketa 
                //tj ako se pojavi drugi id ankete
                //znaci nadalje nema sanse da se ista pojavi
                //znaci trebamo da zapamtimo poziciju dje je nasao sledeci id_ankete
                //a to mozemo pomocu j
                //znaci start = j;
                //stavljamo start = pozicija na kojoj je nasao id
                start = j;

                listaNaslovaAnketa.Add(ankete[start - 1].naziv_ankete);
                lista.Add(radioButtonList1);




            }

            for (int i = 0; i < lista.Count; i++)
            {


              
                Label naslovAnkete = new Label();
                naslovAnkete.Text = listaNaslovaAnketa[i];




                Button dugme = new Button();

                dugme.Attributes["class"] = "anketaGlasanje";
                dugme.Attributes["data-anketaglasanje"] = nizidAnketa[i].ToString(); ;


                dugme.Text = "glasaj";
               

                var div = new HtmlGenericControl("div");


                div.Attributes["class"] = "anketaDiv" + nizidAnketa[i].ToString() + " divoviZaAnkete";
                div.Controls.Add(naslovAnkete);
                div.Controls.Add(lista[i]);
                div.Controls.Add(dugme);

                anketaDiv.Controls.Add(div);
               
            }



        }




        protected void Page_Load(object sender, EventArgs e)
        {
            nizidAnketa = new List<int>();


            OpAnketaSelect op = new OpAnketaSelect();
            OperationObject rezultat = OperationManager.Singleton.executeOp(op);

            AnketaStavkeDbItem[] niz = (AnketaStavkeDbItem[])rezultat.Niz;


            if (niz.Length > 0)
            {
                PrikaziAnkete(niz);
            }
        }
    }
}