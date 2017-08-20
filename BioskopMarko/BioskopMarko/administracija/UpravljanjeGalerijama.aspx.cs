using MilankovDeo.BusinessLayer;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace BioskopMarko.administracija
{
    public partial class UpravljanjeGalerijama : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            this.tabelaZaIzmenuGalerije.Attributes["style"] = "display:none;";


            if (!this.IsPostBack)
            {
                OpIzborGalerijeSelect op = new OpIzborGalerijeSelect();
                OperationObject rezultat = OperationManager.Singleton.executeOp(op);
                if (rezultat != null && rezultat.Niz != null && rezultat.Success != false)
                {
                    GridViewSelectGalerija.DataSource = rezultat.Niz;
                    GridViewSelectGalerija.DataBind();
                }
            }
        }

        protected void ButtonIzmeni_Click(object sender, EventArgs e)
        {
            this.tabelaZaIzmenuGalerije.Attributes["style"] = "display:block;";
            this.GridViewSelectGalerija.Visible = false;


            Button dugme = (Button)sender;
            int skriveniId = Int32.Parse(dugme.CommandArgument);
            this.sakrivenoPolje.Value = skriveniId.ToString();

            OpGalerijaSelectWithId selectGalerijaWithId = new OpGalerijaSelectWithId();
            selectGalerijaWithId.PropertyGalerija = new MilankovDeo.DataLayer.Galerija { IdGalerije = skriveniId };

            OperationObject rezultat = OperationManager.Singleton.executeOp(selectGalerijaWithId);
            if (rezultat != null && rezultat.Niz != null && rezultat.Success != false)
            {
                MilankovDeo.DataLayer.Galerija[] nizGalerija = rezultat.Niz as MilankovDeo.DataLayer.Galerija[];
                
                TextBoxNazivGalerije.Text = nizGalerija[0].NazivGalerije;
                
            }
        }

        protected void ButtonUpdate_Click(object sender, EventArgs e)
        {
            

           

            string uploadFolder = Server.MapPath("~/assets/images/slikeFilmova/");
            string zaBazuFolder = "/assets/images/slikeFilmova/";

            string celaputanjaZaBazu = "";
            if (CheckBoxFileUploadGalerijaUpdate.Checked)
            {

                if (FileUploadGalerijaUpdate.HasFile)
                {




                    string prethodnaSlika = sakrivenoPoljeSlikaPutanja.Value;

                    FileInfo podaciOfajlu = new FileInfo(Server.MapPath("~" + prethodnaSlika));
                    if (podaciOfajlu.Exists)
                    {
                        File.Delete(Server.MapPath("~" + prethodnaSlika));
                    }










                    string fileName = FileUploadGalerijaUpdate.PostedFile.FileName;
                    string novoIme = String.Format("{0}_{1}", DateTime.Now.ToString("ddMMyyyy"), fileName);
                    string tipFajla = FileUploadGalerijaUpdate.PostedFile.ContentType;
                    int velicina = FileUploadGalerijaUpdate.PostedFile.ContentLength;

                    try
                    {
                        FileUploadGalerijaUpdate.SaveAs(uploadFolder + novoIme);

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

            OpGalerijaUpdate galerijaUpdate = new OpGalerijaUpdate();
            galerijaUpdate.PropertyGalerija = new MilankovDeo.DataLayer.Galerija { IdGalerije = Int32.Parse(this.sakrivenoPolje.Value), NazivGalerije = this.TextBoxNazivGalerije.Text, DatumIzmene = DateTime.Now, Korisnik = korisnickoIme, PutanjaDoSlike = celaputanjaZaBazu };
            OperationObject rezultatUpdate = OperationManager.Singleton.executeOp(galerijaUpdate);
            if (rezultatUpdate != null && rezultatUpdate.Niz != null && rezultatUpdate.Success != false)
            {
                this.tabelaZaIzmenuGalerije.Attributes["style"] = "display:none;";
                this.GridViewSelectGalerija.Visible = true;

                GridViewSelectGalerija.DataSource = rezultatUpdate.Niz;
                GridViewSelectGalerija.DataBind();

            }

        }

        protected void ButtonOtkazi_Click(object sender, EventArgs e)
        {
            this.tabelaZaIzmenuGalerije.Attributes["style"] = "display:none;";
            this.GridViewSelectGalerija.Visible = true;
        }

        protected void ButtonUnos_Click(object sender, EventArgs e)
        {
            string uploadFolder = Server.MapPath("~/assets/images/slikeFilmova/");
            string zaBazuFolder = "/assets/images/slikeFilmova/";

            string celaputanjaZaBazu = "";

            
            string fileName = FileUploadUnosGalerije.PostedFile.FileName;
            string novoIme = String.Format("{0}_{1}", DateTime.Now.ToString("ddMMyyyy"), fileName);
            string tipFajla = FileUploadUnosGalerije.PostedFile.ContentType;
            int velicina = FileUploadUnosGalerije.PostedFile.ContentLength;

            try
            {
                FileUploadUnosGalerije.SaveAs(uploadFolder + novoIme);

                celaputanjaZaBazu = zaBazuFolder + novoIme;


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

            OpGalerijaInsert galerijaInsert = new OpGalerijaInsert();
            galerijaInsert.PropertyGalerija = new MilankovDeo.DataLayer.Galerija { NazivGalerije = TextBoxUnosNazivGalerije.Text,  DatumIzmene = DateTime.Now, DatumPostavljanja = DateTime.Now, Korisnik = korisnickoIme, PutanjaDoSlike = celaputanjaZaBazu };
            OperationObject rezultatInsert = OperationManager.Singleton.executeOp(galerijaInsert);
            if (rezultatInsert != null && rezultatInsert.Niz != null && rezultatInsert.Success != false)
            {
                this.tabelaZaIzmenuGalerije.Attributes["style"] = "display:none;";
                this.GridViewSelectGalerija.Visible = true;

                GridViewSelectGalerija.DataSource = rezultatInsert.Niz;
                GridViewSelectGalerija.DataBind();

            }
        }

        protected void ButtonObrisi_Click(object sender, EventArgs e)
        {
            Button dugme = (Button)sender;
            int skrivenId = Int32.Parse(dugme.CommandArgument);



            OpGalerijaDelete galerijaDelete = new OpGalerijaDelete();
            galerijaDelete.PropertyGalerija = new MilankovDeo.DataLayer.Galerija { IdGalerije = skrivenId };
            OperationObject rezultatDelete = OperationManager.Singleton.executeOp(galerijaDelete);

            if (rezultatDelete != null && rezultatDelete.Niz != null && rezultatDelete.Success != false)
            {
                GridViewSelectGalerija.DataSource = rezultatDelete.Niz;
                GridViewSelectGalerija.DataBind();
            }
        }




        
    }
}