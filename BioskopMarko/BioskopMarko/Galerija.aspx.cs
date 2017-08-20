using MilankovDeo.BusinessLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace BioskopMarko
{
    public partial class Galerija : System.Web.UI.Page
    {
        private int brojSlika;

        public int BrojSlika
        {
            get { return brojSlika; }
            set { brojSlika = value; }
        }

        

        private void napuniStranicenje(int idGalerije)
        {
            StringBuilder text = new StringBuilder();

            int straneUkupno = (brojSlika % 4 == 0) ? (BrojSlika / 4) : (BrojSlika / 4) + 1;

            for (int i = 1; i <= straneUkupno; i++)
            {
                text.Append(String.Format("<a href='?strana={0}&idGalerije={1}'>{2}</a>", i, idGalerije,i));
            }

            galerijaStranicenje.InnerHtml = text.ToString();
            galerijaStranicenje.Attributes["class"] = "galerijaStranicenje col-lg-4 col-lg-offset-5";
        }

        protected void Page_Load(object sender, EventArgs e)
        {

            OpIzborGalerijeSelect opGalerije = new OpIzborGalerijeSelect();
            OperationObject rezultat = OperationManager.Singleton.executeOp(opGalerije);

            MilankovDeo.DataLayer.Galerija[] niz = rezultat.Niz as MilankovDeo.DataLayer.Galerija[];
            

            ListViewIzborGalerije.DataSource = niz;
            ListViewIzborGalerije.DataBind();


            int idGalerije = Request.QueryString["idGalerije"] == null ? 1 : Int32.Parse(Request.QueryString["idGalerije"]);
            int strana = Request.QueryString["strana"] == null ? 0 : Int32.Parse(Request.QueryString["strana"]);

            OpSlikeSelect op = new OpSlikeSelect();


            op.Slika = new MilankovDeo.DataLayer.Slike
            {
                IdGalerije = idGalerije
            };
            

            if (strana != 0 && strana != 1)
            {
                op.Strana = strana;
            }
            else op.Strana = 1;


            op.MaxPoStrani = 4;


            OpObjSlike opObj = OperationManager.Singleton.executeOp(op) as OpObjSlike;
            if (opObj == null || opObj.Niz == null)
                return;

            for (int i = 0; i < niz.Length; i++)
			{
                if(niz[i].IdGalerije == idGalerije)
                {
                     nazivTrenutneGalerije.InnerText = niz[i].NazivGalerije;
                     break;
                }
			}
           
            ListViewGalerija.DataSource = opObj.Niz;
            ListViewGalerija.DataBind();
            this.brojSlika = opObj.ukupanBrojSlika;
            napuniStranicenje(idGalerije);
        }
    }
}