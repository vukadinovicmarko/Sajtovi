using MilankovDeo.BusinessLayer;
using MilankovDeo.DataLayer;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace BioskopMarko.administracija
{
    public partial class UpravljanjeFilmovima : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

            if(!this.IsPostBack)
            {

            this.tabelaZaIzmenuFilmova.Attributes["style"] = "display:none;";
            OpFilmoviSlozeniSelect op = new OpFilmoviSlozeniSelect();
            OperationObject rezultat = OperationManager.Singleton.executeOp(op);


            if (rezultat != null && rezultat.Niz != null && rezultat.Success != false)
            {

                                

                
                GridViewSelectFilmova.DataSource = rezultat.Niz;
                GridViewSelectFilmova.DataBind();

                OpBioskopiSelect bioskopi = new OpBioskopiSelect();
                OperationObject rezultatBioskopi = OperationManager.Singleton.executeOp(bioskopi);
	
                Bioskopi[] niz = rezultatBioskopi.Niz as Bioskopi[];
                
                
                DropDownListBioskopZaInsert.Items.Clear();
                for (int i = 0; i < niz.Length; i++)
			    {
                    ListItem lista = new ListItem();
			        lista.Text = niz[i].NazivBioskopa;
                    lista.Value= niz[i].IdBioskopa.ToString();
                    DropDownListBioskopZaInsert.Items.Add(lista);

                }

                OpZanroviBase zanrovi = new OpZanroviBase();
                OperationObject rezultatZanrovi = OperationManager.Singleton.executeOp(zanrovi);

                Zanrovi[] nizZanrova = rezultatZanrovi.Niz as Zanrovi[];

                CheckBoxListZanrZaInsert.Items.Clear();
                for (int i = 0; i < nizZanrova.Length; i++)
                {
                    ListItem listaZanrova = new ListItem();
                    listaZanrova.Text = nizZanrova[i].NazivZanra;
                    listaZanrova.Value = nizZanrova[i].IdZanra.ToString();
                    CheckBoxListZanrZaInsert.Items.Add(listaZanrova);
                }


              



            }




            }

        }

        protected void ButtonIzmeni_Click(object sender, EventArgs e)
        {
            this.tabelaZaIzmenuFilmova.Attributes["style"] = "display:block;";
            this.GridViewSelectFilmova.Visible = false;

            Button dugme = (Button)sender;
            int skriveniId = Int32.Parse(dugme.CommandArgument);
            this.sakrivenoPolje.Value = skriveniId.ToString();

            OpFilmoviSelectWhereId op = new OpFilmoviSelectWhereId();
            op.PropertiFilmovi = new Filmovi { IdFilma = skriveniId };

            OperationObject rezultat = OperationManager.Singleton.executeOp(op);
            Filmovi[] niz = rezultat.Niz as Filmovi[];
            this.TextBoxNazivFilma.Text = niz[0].NazivFilma;
            this.TextBoxOcena.Text = niz[0].Ocena.ToString();
            this.TextBoxOpisFilma.Text = niz[0].OpisFilma;
            this.sakrivenoPoljeSlikaPutanja.Value = niz[0].PutanjaDoSlike;


            OpBioskopiSelect bioskopi = new OpBioskopiSelect();
            OperationObject rezultatBioskopi = OperationManager.Singleton.executeOp(bioskopi);

            if (rezultatBioskopi != null && rezultatBioskopi.Niz != null && rezultatBioskopi.Success != false)
            {
                Bioskopi[] nizBioskopa = rezultatBioskopi.Niz as Bioskopi[];

                DropDownListBioskopi.Items.Clear();
                for (int i = 0; i < nizBioskopa.Length; i++)
                {
                    ListItem lista = new ListItem();
                    lista.Value = nizBioskopa[i].IdBioskopa.ToString();
                    lista.Text = nizBioskopa[i].NazivBioskopa;
                    DropDownListBioskopi.Items.Add(lista);
                    
                }
                DropDownListBioskopi.SelectedValue = niz[0].IdBioskopa.ToString();
            }

            OpZanroviBase zanrovi = new OpZanroviBase();
            OperationObject rezultatZanrovi = OperationManager.Singleton.executeOp(zanrovi);

            if (rezultatZanrovi != null && rezultat.Niz != null && rezultatZanrovi.Success != false)
            {
                Zanrovi[] nizZanrovi = rezultatZanrovi.Niz as Zanrovi[];

                CheckBoxListZanr.Items.Clear();

                for (int i = 0; i < nizZanrovi.Length; i++)
			    {
                    
			        ListItem lista = new ListItem();
                    lista.Value = nizZanrovi[i].IdZanra.ToString();
                    lista.Text = nizZanrovi[i].NazivZanra;

                    CheckBoxListZanr.Items.Add(lista);
			    }

                string[] nizSelektovanihZanrova = niz[0].Zanrovi.Split(',');

                
                for (int i = 0; i < nizSelektovanihZanrova.Length; i++)
                {
                    for (int j = 0; j < CheckBoxListZanr.Items.Count; j++)
                    {
                        if (CheckBoxListZanr.Items[j].Text == nizSelektovanihZanrova[i])
                        {
                            CheckBoxListZanr.Items[j].Selected = true;
                        }
                    }
                }
              
               
            }

        }

        protected void ButtonOtkazi_Click(object sender, EventArgs e)
        {
            this.tabelaZaIzmenuFilmova.Attributes["style"] = "display:none;";
            this.GridViewSelectFilmova.Visible = true;
        }

        protected void ButtonUpdate_Click(object sender, EventArgs e)
        {
            



            string uploadFolder = Server.MapPath("~/assets/images/slikeFilmova/");
            string zaBazuFolder = "/assets/images/slikeFilmova/";

            string celaputanjaZaBazu = "";
 
            

                string nazivFilma = TextBoxNazivFilma.Text;
                string opisFilma = TextBoxOpisFilma.Text;
                int ocenaFilma = Int32.Parse(TextBoxOcena.Text);
                string idBioskopa = DropDownListBioskopi.SelectedItem.Value;

                string cekirano = "";
                foreach (ListItem item in CheckBoxListZanr.Items)
                {



                    if (item.Selected == true)
                    {
                        if (cekirano.Length > 0)
                            cekirano += "," + item.Text;
                        else cekirano += item.Text;
                    }

                }


            if (CheckBoxFileUpload.Checked)
            {

                if(FileUploadSlika.HasFile)
                {




                    string prethodnaSlika = sakrivenoPoljeSlikaPutanja.Value;
                    
                        FileInfo podaciOfajlu = new FileInfo(Server.MapPath("~"+prethodnaSlika));
                        if (podaciOfajlu.Exists)
                        {
                            File.Delete(Server.MapPath("~" + prethodnaSlika));
                        }
                    









                    string fileName = FileUploadSlika.PostedFile.FileName;
                    string novoIme = String.Format("{0}_{1}", DateTime.Now.ToString("ddMMyyyy"), fileName);
                    string tipFajla = FileUploadSlika.PostedFile.ContentType;
                    int velicina = FileUploadSlika.PostedFile.ContentLength;

                    try
                    {
                        FileUploadSlika.SaveAs(uploadFolder + novoIme);

                        celaputanjaZaBazu = zaBazuFolder + novoIme;


                    }
                    catch (Exception ex)
                    {

                    }
                    finally
                    {

                    }
            

                }
                else
                {
                    //ovdje napises NISTE IZABRALI SLIKU
                    return;
                }
               
              


                
            }
            else
            {
                celaputanjaZaBazu = sakrivenoPoljeSlikaPutanja.Value;
            }    
                string korisnickoIme;
                
                if (User.Identity.IsAuthenticated)
                     korisnickoIme = User.Identity.Name.ToString();
                    else
                         korisnickoIme = "No user identity available.";

                OpFilmoviUpdate update = new OpFilmoviUpdate();
                update.PropertiFilmovi = new Filmovi { IdFilma = Int32.Parse(this.sakrivenoPolje.Value), NazivFilma = nazivFilma, OpisFilma = opisFilma, Ocena = ocenaFilma, IdBioskopa = Int32.Parse(idBioskopa), Zanrovi = cekirano, PutanjaDoSlike = celaputanjaZaBazu, Korisnik = korisnickoIme };

                OperationObject rezultatUpdate = OperationManager.Singleton.executeOp(update);
                if (rezultatUpdate != null && rezultatUpdate.Niz != null && rezultatUpdate.Success != false)
                {
                    this.tabelaZaIzmenuFilmova.Attributes["style"] = "display:none";
                    this.GridViewSelectFilmova.Visible = true;
                    GridViewSelectFilmova.DataSource = rezultatUpdate.Niz;
                    GridViewSelectFilmova.DataBind();
                }

                TextBoxNazivFilma.Text = string.Empty;
                TextBoxOcena.Text = string.Empty;
                TextBoxOpisFilma.Text = string.Empty;

                
              

        }

        protected void ButtonObrisi_Click(object sender, EventArgs e)
        {
            Button dugme = (Button)sender;
            int skrivenId = Int32.Parse(dugme.CommandArgument);
            
            

            OpFilmoviDelete delete = new OpFilmoviDelete();
            delete.PropertiFilmovi = new Filmovi { IdFilma = skrivenId };
            OperationObject rezultatDelete = OperationManager.Singleton.executeOp(delete);

            if (rezultatDelete != null && rezultatDelete.Niz != null && rezultatDelete.Success != false)
            {
                GridViewSelectFilmova.DataSource = rezultatDelete.Niz;
                GridViewSelectFilmova.DataBind();
            }



        }

        protected void ButtonUnesi_Click(object sender, EventArgs e)
        {
            string nazivFilma = TextBoxNazivFilmaZaInsert.Text;
            string idBioskopa = this.DropDownListBioskopZaInsert.SelectedItem.Value;
            int ocena = Int32.Parse(TextBoxOcenaZaInsert.Text);

            string opisFilma = TextBoxOpisFilmaZaInsert.Text;


            string cekirano = "";
            foreach (ListItem item in CheckBoxListZanrZaInsert.Items)
            {



                if (item.Selected == true)
                {
                    if (cekirano.Length > 0)
                        cekirano += "," + item.Text;
                    else cekirano += item.Text;
                }

            }


            string uploadFolder = Server.MapPath("~/assets/images/slikeFilmova/");
            string zaBazuFolder = "/assets/images/slikeFilmova/";

            string fileName = FileUploadFileSlikaZaInsert.PostedFile.FileName;
            string novoIme = String.Format("{0}_{1}", DateTime.Now.ToString("ddMMyyyy"), fileName);
            string tipFajla = FileUploadFileSlikaZaInsert.PostedFile.ContentType;
            int velicina = FileUploadFileSlikaZaInsert.PostedFile.ContentLength;

            try
            {
                FileUploadFileSlikaZaInsert.SaveAs(uploadFolder + novoIme);

                


            }
            catch (Exception ex)
            {

            }
            finally
            {

            }
            string korisnickoIme;

            if (User.Identity.IsAuthenticated)
                korisnickoIme = User.Identity.Name.ToString();
            else
                korisnickoIme = "No user identity available.";

            OpFilmoviInsert insert = new OpFilmoviInsert();
            insert.PropertiFilmovi = new Filmovi { NazivFilma = nazivFilma, IdBioskopa = Int32.Parse(idBioskopa), Ocena = ocena, DatumPostavljanja = DateTime.Now, OpisFilma = opisFilma, PutanjaDoSlike = zaBazuFolder + novoIme, Zanrovi = cekirano, Korisnik = korisnickoIme };

            OperationObject rezultatInsertFilmova = OperationManager.Singleton.executeOp(insert);

            if (rezultatInsertFilmova != null && rezultatInsertFilmova.Niz != null && rezultatInsertFilmova.Success != false)
            {
                GridViewSelectFilmova.DataSource = rezultatInsertFilmova.Niz;
                GridViewSelectFilmova.DataBind();
            }



        }
    }
}