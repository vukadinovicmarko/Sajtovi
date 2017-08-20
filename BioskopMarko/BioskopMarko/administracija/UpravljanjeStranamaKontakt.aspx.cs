using MilankovDeo.BusinessLayer;
using MilankovDeo.DataLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace BioskopMarko.administracija
{
    public partial class UpravljanjeStranamaKontakt : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            this.tabelaZaIzmenuGalerije.Attributes["style"] = "display:none;";

            if(!this.IsPostBack)
            {
                OpStranaKontaktBase op = new OpStranaKontaktBase();
                OperationObject rezultat = OperationManager.Singleton.executeOp(op);
                if (rezultat != null && rezultat.Niz != null && rezultat.Success != false)
                {
                    GridViewSelectStranaKontakt.DataSource = rezultat.Niz;
                    GridViewSelectStranaKontakt.DataBind();
                }


            }
            
        }

        protected void ButtonIzmeni_Click(object sender, EventArgs e)
        {
            this.tabelaZaIzmenuGalerije.Attributes["style"] = "display:block;";
            this.GridViewSelectStranaKontakt.Visible = false;

            Button dugme = (Button)sender;
            int skriveniId = Int32.Parse(dugme.CommandArgument);
            this.sakrivenoPolje.Value = skriveniId.ToString();

            OpStranaKontaktSelectWhereId opwhereid = new OpStranaKontaktSelectWhereId();
            opwhereid.PropertiStranaKontakt = new StranaKontakt { IdStraneKontakt = skriveniId };

            OperationObject rezultatStranaKontakt = OperationManager.Singleton.executeOp(opwhereid);

            StranaKontakt[] stranaNiz = rezultatStranaKontakt.Niz as StranaKontakt[];

            //string glavniNaslovStraneKontakt = "";
            //string glavniTekstStraneKontakt = "";
            //for (int i = 0; i < stranaNiz.Length; i++)
            //{
                
            //    glavniNaslovStraneKontakt += stranaNiz[i].NaslovStraneKontakt;
            //    glavniTekstStraneKontakt += stranaNiz[i].TekstStraneKontakt;
            //}


            //this.TextBoxNaslovStraneKontakt.Text = glavniNaslovStraneKontakt;
            //this.TextBoxTekstStraneKontakt.Text = glavniTekstStraneKontakt;


            TextBoxNazivStraneKontakt.Text = stranaNiz[0].NazivStraneKontakt;
            TextBoxNaslovStraneKontakt.Text = stranaNiz[0].NaslovStraneKontakt;
            TextBoxTekstStraneKontakt.Text  = stranaNiz[0].TekstStraneKontakt;


            OpBioskopiSelect opBioskopi = new OpBioskopiSelect();
            OperationObject rezultatBioskopa = OperationManager.Singleton.executeOp(opBioskopi);

            if (rezultatBioskopa != null && rezultatBioskopa.Niz != null && rezultatBioskopa.Success != false)
            {

                CheckBoxListBioskopi.Items.Clear();
                Bioskopi[] nizBioskopa = rezultatBioskopa.Niz as Bioskopi[];
                for (int i = 0; i < nizBioskopa.Length; i++)
                {
                    ListItem lista = new ListItem();
                    lista.Value = nizBioskopa[i].IdBioskopa.ToString();
                    lista.Text = nizBioskopa[i].NazivBioskopa;
                    CheckBoxListBioskopi.Items.Add(lista);
                }
            }

            string[] bioskopiDoradjeno = stranaNiz[0].Bioskopi.Split(',');

           
            for (int i = 0; i < bioskopiDoradjeno.Length; i++)
            {




                OpBisokopiSelectWhereId bioskopiId = new OpBisokopiSelectWhereId();
                bioskopiId.PropertiBioskopi = new Bioskopi { NazivBioskopa = bioskopiDoradjeno[i] };

                OperationObject rezultatBioskopiId = OperationManager.Singleton.executeOp(bioskopiId);


                Bioskopi[] bioskopiNiz = rezultatBioskopiId.Niz as Bioskopi[];

                if (rezultatBioskopiId != null && rezultatBioskopiId.Niz != null && rezultatBioskopiId.Success != false)
                {
                    for (int j = 0; j < CheckBoxListBioskopi.Items.Count; j++)
                    {
                        if (CheckBoxListBioskopi.Items[j].Text == bioskopiDoradjeno[i])
                        {
                            CheckBoxListBioskopi.Items[j].Selected = true;
                        }
                    }
                }
            }
        }

        protected void ButtonOtkazi_Click(object sender, EventArgs e)
        {
            this.tabelaZaIzmenuGalerije.Attributes["style"] = "display:none;";
            this.GridViewSelectStranaKontakt.Visible = true;

        }

        protected void ButtonUpdate_Click(object sender, EventArgs e)
        {
            this.tabelaZaIzmenuGalerije.Attributes["style"] = "display:none;";
            this.GridViewSelectStranaKontakt.Visible = true;

            string cekirano = "";
            foreach (ListItem item in CheckBoxListBioskopi.Items)
            {



                if (item.Selected == true)
                {
                    if (cekirano.Length > 0)
                        cekirano += "," + item.Text;
                    else cekirano += item.Text;
                }

            }

            string korisnickoIme;

            if (User.Identity.IsAuthenticated)
                korisnickoIme = User.Identity.Name.ToString();
            else
                korisnickoIme = "No user identity available.";

            OpStranaKontaktUpdate update = new OpStranaKontaktUpdate();
            update.PropertiStranaKontakt = new StranaKontakt { IdStraneKontakt = Int32.Parse(this.sakrivenoPolje.Value), NazivStraneKontakt = this.TextBoxNazivStraneKontakt.Text, NaslovStraneKontakt = this.TextBoxNaslovStraneKontakt.Text , TekstStraneKontakt = TextBoxTekstStraneKontakt.Text , Bioskopi = cekirano,  DatumIzmene = DateTime.Now,  Korisnik = korisnickoIme };

            OperationObject rezultatUpdateStraneKontakt= OperationManager.Singleton.executeOp(update);

            if (rezultatUpdateStraneKontakt != null && rezultatUpdateStraneKontakt.Niz != null && rezultatUpdateStraneKontakt.Success != false)
            {
                GridViewSelectStranaKontakt.DataSource = rezultatUpdateStraneKontakt.Niz;
                GridViewSelectStranaKontakt.DataBind();
            }

        }



    }
}