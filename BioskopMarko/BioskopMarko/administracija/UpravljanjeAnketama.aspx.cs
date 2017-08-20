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
    public partial class UpravljanjeAnketama : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            if (!this.IsPostBack)
            {

                OpSamoAnketaSelect op = new OpSamoAnketaSelect();

                OperationObject rezultat = OperationManager.Singleton.executeOp(op);

                ankete[] niz = rezultat.Niz as ankete[];

                napuniDropDownListu(niz);
            }

            divPrikazStavki.Visible = true;
            LinkButtonInsertStavke.Visible = false;

            divInsertUpdateStavki.Visible = false;
            divUdateAnketa.Visible = false;
        }



        private void napuniDropDownListu(ankete[] niz)
        {
            DropDownListSveAnkete.Items.Clear();
            DropDownListSveAnkete.Items.Add(new ListItem("choose survey to edit", "0"));

            for (int i = 0; i < niz.Length; i++)
            {
                ListItem l1 = new ListItem();
                l1.Text = niz[i].naziv_ankete;
                l1.Value = niz[i].Id_ankete.ToString();
                DropDownListSveAnkete.Items.Add(l1);
            }
        }
        protected void DropDownListSveAnkete_SelectedIndexChanged(object sender, EventArgs e)
        {
            DropDownList ddl = (DropDownList)sender;

            OpAnketaSelect op = new OpAnketaSelect();

            if (ddl.SelectedValue.CompareTo("0") == 0)
                return;


            divPrikazStavki.Visible = true;
            LinkButtonInsertStavke.Visible = true;


            op.anketaDataSelect = new AnketaStavkeDbItem
            {
                Id_ankete = Int32.Parse(ddl.SelectedValue)
            };

            OperationObject rezultat = OperationManager.Singleton.executeOp(op);

            GridViewStavke.DataSource = rezultat.Niz;
            GridViewStavke.DataBind();

        }

        protected void ButtonIzmeniStavku_Click(object sender, EventArgs e)
        {


            if (DropDownListSveAnkete.SelectedValue.CompareTo("0") == 0)
                return;

            divPrikazStavki.Visible = true;
            LinkButtonInsertStavke.Visible = false;

            divInsertUpdateStavki.Visible = true;



            Button button = (Button)sender;

            int idStavke = Int32.Parse(button.CommandArgument);
            int idAnkete = Int32.Parse(DropDownListSveAnkete.SelectedValue);


            //ne radi dobro ovaj select treba da stavis i where idstavka = idstavka a ne samo id
            //napravi novi select za ovu operaciju
            OpAnketaStavkaSelect op = new OpAnketaStavkaSelect();
            op.anketaDataSelect = new AnketaStavkeDbItem
            {

                Id_stavke = idStavke,
                Id_ankete = idAnkete
            };


            OperationObject rezultat = OperationManager.Singleton.executeOp(op);
            AnketaStavkeDbItem[] niz = rezultat.Niz as AnketaStavkeDbItem[];




            TextBoxNazivStavke.Text = niz[0].odgovor;
            TextBoxBrojGlasova.Text = niz[0].broj_glasova.ToString();
            HiddenFieldIdAnkete.Value = idAnkete.ToString();
            HiddenFieldIdStavke.Value = idStavke.ToString();


            ButtonUnosStavki.CommandName = "update";

        }

        protected void ButtonIzbrisiStavku_Click(object sender, EventArgs e)
        {
            if (DropDownListSveAnkete.SelectedValue.CompareTo("0") == 0)
                return;

            divPrikazStavki.Visible = true;
            LinkButtonInsertStavke.Visible = true;


            Button button = (Button)sender;
            int idStavke = Int32.Parse(button.CommandArgument);
            int idAnkete = Int32.Parse(DropDownListSveAnkete.SelectedValue);


            OpStavkeDelete op = new OpStavkeDelete();
            op.anketaDataSelect = new AnketaStavkeDbItem
            {

                Id_stavke = idStavke,
                Id_ankete = idAnkete
            };


            OperationObject rezultat = OperationManager.Singleton.executeOp(op);
            GridViewStavke.DataSource = null;
            GridViewStavke.DataSource = rezultat.Niz;
            GridViewStavke.DataBind();
        }
        protected void LinkButtonInsertStavke_Click(object sender, EventArgs e)
        {
            if (DropDownListSveAnkete.SelectedValue.CompareTo("0") == 0)
                return;

            int idAnkete = Int32.Parse(DropDownListSveAnkete.SelectedValue);

            HiddenFieldIdAnkete.Value = idAnkete.ToString();



            ButtonUnosStavki.CommandName = "insert";

            divPrikazStavki.Visible = true;
            LinkButtonInsertStavke.Visible = false;

            divInsertUpdateStavki.Visible = true;


            redKojiSeKrije.Visible = false;

        }
        protected void ButtonUnosStavki_Click(object sender, EventArgs e)
        {
            Button dugme = (Button)sender;

            if (dugme.CommandName == "insert")
            {
                string odgovor = TextBoxNazivStavke.Text;
                int idAnkete = Int32.Parse(HiddenFieldIdAnkete.Value);

                OpAnketaInsert op = new OpAnketaInsert();
                op.anketaDataSelect = new AnketaStavkeDbItem
                {
                    Id_ankete = idAnkete,
                    odgovor = odgovor
                };


                OperationObject rezultat = OperationManager.Singleton.executeOp(op);
                GridViewStavke.DataSource = null;
                GridViewStavke.DataSource = rezultat.Niz;
                GridViewStavke.DataBind();
            }
            else if (dugme.CommandName == "update")
            {
                string odgovor = TextBoxNazivStavke.Text;
                int brojglasova = Int32.Parse(TextBoxBrojGlasova.Text);
                int idStavke = Int32.Parse(HiddenFieldIdStavke.Value);
                int idAnkete = Int32.Parse(HiddenFieldIdAnkete.Value);

                OpStavkeUpdate op = new OpStavkeUpdate();
                op.anketaDataSelect = new AnketaStavkeDbItem
                {

                    Id_stavke = idStavke,
                    Id_ankete = idAnkete,
                    odgovor = odgovor,
                    broj_glasova = brojglasova
                };


                OperationObject rezultat = OperationManager.Singleton.executeOp(op);
                GridViewStavke.DataSource = null;
                GridViewStavke.DataSource = rezultat.Niz;
                GridViewStavke.DataBind();
            }

            divPrikazStavki.Visible = true;
            LinkButtonInsertStavke.Visible = true;

            divInsertUpdateStavki.Visible = false;
            divUdateAnketa.Visible = false;


            redKojiSeKrije.Visible = true;

        }



        protected void LinkButtonInsertSurvey_Click(object sender, EventArgs e)
        {


            int idAnkete = Int32.Parse(DropDownListSveAnkete.SelectedValue);

            HiddenFieldIdAnkete.Value = idAnkete.ToString();



            ButtonUnosAnketa.CommandName = "insert";

            divPrikazStavki.Visible = false;
            LinkButtonInsertStavke.Visible = false;

            divInsertUpdateStavki.Visible = false;
            divUdateAnketa.Visible = true;




        }
        protected void LinkButtonEdit_Click(object sender, EventArgs e)
        {
            if (DropDownListSveAnkete.SelectedValue.CompareTo("0") == 0)
                return;

            int idAnkete = Int32.Parse(DropDownListSveAnkete.SelectedValue);


            //ne radi dobro ovaj select treba da stavis i where idstavka = idstavka a ne samo id
            //napravi novi select za ovu operaciju
            OpSamoAnketaSelect op = new OpSamoAnketaSelect();
            op.anketaData = new ankete
            {
                Id_ankete = idAnkete
            };


            OperationObject rezultat = OperationManager.Singleton.executeOp(op);
            ankete[] niz = rezultat.Niz as ankete[];


            TextBoxNazivAnkete.Text = niz[0].naziv_ankete;
            HiddenFieldIdAnkete.Value = idAnkete.ToString();


            ButtonUnosAnketa.CommandName = "update";


            divPrikazStavki.Visible = false;
            LinkButtonInsertStavke.Visible = false;

            divInsertUpdateStavki.Visible = false;
            divUdateAnketa.Visible = true;
        }

        protected void LinkButtonDelete_Click(object sender, EventArgs e)
        {

            if (DropDownListSveAnkete.SelectedValue.CompareTo("0") == 0)
                return;

            int idAnkete = Int32.Parse(DropDownListSveAnkete.SelectedValue);


            OpSamoAnketaDelete op = new OpSamoAnketaDelete();
            op.anketaData = new ankete
            {
                Id_ankete = idAnkete
            };

            OperationObject rezultat = OperationManager.Singleton.executeOp(op);
            ankete[] niz = rezultat.Niz as ankete[];
            napuniDropDownListu(niz);


            divPrikazStavki.Visible = true;
            LinkButtonInsertStavke.Visible = true;

            divInsertUpdateStavki.Visible = false;
            divUdateAnketa.Visible = false;
        }



        protected void ButtonUnosAnketa_Click(object sender, EventArgs e)
        {
            Button dugme = (Button)sender;

            if (dugme.CommandName == "insert")
            {
                string naziv_ankete = TextBoxNazivAnkete.Text;

                OpSamoAnketaInsert op = new OpSamoAnketaInsert();
                op.anketaData = new ankete
                {
                    naziv_ankete = naziv_ankete
                };

                OperationObject rezultat = OperationManager.Singleton.executeOp(op);
                ankete[] niz = rezultat.Niz as ankete[];
                napuniDropDownListu(niz);

            }
            else if (dugme.CommandName == "update")
            {
                string naziv_ankete = TextBoxNazivAnkete.Text;
                int idAnkete = Int32.Parse(HiddenFieldIdAnkete.Value);


                OpSamoAnketaUpdate op = new OpSamoAnketaUpdate();
                op.anketaData = new ankete
                {
                    Id_ankete = idAnkete,
                    naziv_ankete = naziv_ankete
                };

                OperationObject rezultat = OperationManager.Singleton.executeOp(op);
                ankete[] niz = rezultat.Niz as ankete[];
                napuniDropDownListu(niz);


            }

            divPrikazStavki.Visible = true;
            LinkButtonInsertStavke.Visible = true;

            divInsertUpdateStavki.Visible = false;
            divUdateAnketa.Visible = false;
        }

    }
}