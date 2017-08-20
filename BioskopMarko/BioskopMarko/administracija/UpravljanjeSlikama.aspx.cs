using MilankovDeo.BusinessLayer;
using MilankovDeo.DataLayer;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace BioskopMarko.administracija
{
    public partial class UpravljanjeSlikama : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            this.tabelaZaIzmenuSlika.Attributes["style"] = "display:none;";

            //ako se prvi put loaduje strana kasnije dogadjaji ponovo ispisuju sadrzaj
            if (!this.IsPostBack)
            {

                OpIzborGalerijeSelect opGalerije = new OpIzborGalerijeSelect();
                OperationObject rezultat = OperationManager.Singleton.executeOp(opGalerije);
                DropDownListGalerije.Items.Clear();
                MilankovDeo.DataLayer.Galerija[] niz = rezultat.Niz as MilankovDeo.DataLayer.Galerija[];
                


                for (int i = 0; i < niz.Length; i++)
                {
                    ListItem lista = new ListItem();
                    lista.Text = niz[i].NazivGalerije;
                    lista.Value = niz[i].IdGalerije.ToString();
                    DropDownListGalerije.Items.Add(lista);
                    DropDownListGalerije.DataBind();
                    DropDownListUnosSlika.Items.Add(lista);
                    DropDownListUnosSlika.DataBind();
                }
                

                int idGalerije = niz[0].IdGalerije;

                OpSlikeSlozeniSelectWhereId opSlikaWhereId = new OpSlikeSlozeniSelectWhereId();
                opSlikaWhereId.Slika = new Slike { IdGalerije = idGalerije };
                OperationObject rezultatSlikeWhereId = OperationManager.Singleton.executeOp(opSlikaWhereId);





                GridViewUpravljanjeSlikama.DataSource = rezultatSlikeWhereId.Niz;
                GridViewUpravljanjeSlikama.DataBind();
                //   GridViewUpravljanjeSlikama.DeleteMethod = "IzbrisiStavkuIzGridViewa";













                

              



            }
        }


        

        protected void DropDownListGalerije_SelectedIndexChanged(object sender, EventArgs e)
        {
            int idGalerije = Int32.Parse(DropDownListGalerije.SelectedValue);
            


            OpSlikeSlozeniSelectWhereId opSlikaWhereId = new OpSlikeSlozeniSelectWhereId();
            opSlikaWhereId.Slika = new Slike { IdGalerije = idGalerije };
            OperationObject rezultatSlikeWhereId = OperationManager.Singleton.executeOp(opSlikaWhereId);

            GridViewUpravljanjeSlikama.DataSource = rezultatSlikeWhereId.Niz;
            GridViewUpravljanjeSlikama.DataBind();
        }


        protected void ButtonIzmeni_Click(object sender, EventArgs e)
        {
            

            this.tabelaZaIzmenuSlika.Attributes["style"] = "display:block;";
            this.GridViewUpravljanjeSlikama.Visible = false;

            Button dugme = (Button)sender;
            int skriveniId = Int32.Parse(dugme.CommandArgument);
            this.sakrivenoPolje.Value = skriveniId.ToString();


            OpSlikeWhereIdSlike opSelectSlikeWhereId = new OpSlikeWhereIdSlike();
            opSelectSlikeWhereId.Slike = new Slike { IdSlike = skriveniId };

            OperationObject rezultatSlikeWhereId = OperationManager.Singleton.executeOp(opSelectSlikeWhereId);
            Slike[] nizRezultatSlikeWhereId = rezultatSlikeWhereId.Niz as Slike[];

            TextBoxNazivSlike.Text = nizRezultatSlikeWhereId[0].NazivSlike;
            

            OpIzborGalerijeSelect galerije = new OpIzborGalerijeSelect();
            OperationObject rezultatGalerije = OperationManager.Singleton.executeOp(galerije);

            MilankovDeo.DataLayer.Galerija[] nizGalerije = rezultatGalerije.Niz as  MilankovDeo.DataLayer.Galerija[];




            sakrivenoPoljeSlikaPutanja.Value = nizRezultatSlikeWhereId[0].PutanjaDoSlike;



            DropDownListSlike.Items.Clear();
            for (int i = 0; i < nizGalerije.Length; i++)
            {
                ListItem listaGalerija = new ListItem();
                listaGalerija.Text = nizGalerije[i].NazivGalerije;
                listaGalerija.Value = nizGalerije[i].IdGalerije.ToString();
                DropDownListSlike.Items.Add(listaGalerija);
                
            }
            DropDownListSlike.SelectedValue = nizRezultatSlikeWhereId[0].IdGalerije.ToString();
            


        }



        protected void ButtonUpdate_Click(object sender, EventArgs e)
        {

            string uploadFolder = Server.MapPath("~/assets/images/slikeFilmova/");
            string zaBazuFolder = "/assets/images/slikeFilmova/";

            string celaputanjaZaBazu = "";




            string fileName = FileUploadSlika.PostedFile.FileName;
            string novoIme = String.Format("{0}_{1}", DateTime.Now.ToString("ddMMyyyy"), fileName);
            string tipFajla = FileUploadSlika.PostedFile.ContentType;
            int velicina = FileUploadSlika.PostedFile.ContentLength;
            string prethodnaSlika = sakrivenoPoljeSlikaPutanja.Value;


            celaputanjaZaBazu = zaBazuFolder + novoIme;

            

            if (!CheckBoxFileUploadSlika.Checked)
            {
                celaputanjaZaBazu = sakrivenoPoljeSlikaPutanja.Value;
            }








            if (CheckBoxFileUploadSlika.Checked)
            {



                if (!FileUploadSlika.HasFile)
                {
                    return;
                }

                if ((tipFajla == "image/pjpeg") || (tipFajla == "image/gif") || (tipFajla == "image/jpeg"))
                {
                    if (velicina > 1024000 * 30)
                    {
                        //"Fajl je veci od 100 kB!";
                        return;
                    }
                }
                else
                {
                    //ne moze taj format
                    return;
                }
            }





                   

                    try
                    {


                        string korisnickoIme;

                        if (User.Identity.IsAuthenticated)
                            korisnickoIme = User.Identity.Name.ToString();
                        else
                            korisnickoIme = "No user identity available.";

                        OpSlikeUpdate slikeUpdate = new OpSlikeUpdate();
                        slikeUpdate.Slika = new Slike { IdSlike = Int32.Parse(this.sakrivenoPolje.Value), NazivSlike = this.TextBoxNazivSlike.Text, IdGalerije = Int32.Parse(this.DropDownListSlike.SelectedValue), DatumIzmene = DateTime.Now, Korisnik = korisnickoIme, PutanjaDoSlike = celaputanjaZaBazu };
                        OperationObject rezultatUpdate = OperationManager.Singleton.executeOp(slikeUpdate);
                        if (rezultatUpdate != null && rezultatUpdate.Niz != null && rezultatUpdate.Success != false)
                        {

                            if (CheckBoxFileUploadSlika.Checked)
                            {

                                if (FileUploadSlika.HasFile)
                                {






                                    FileInfo podaciOfajlu = new FileInfo(Server.MapPath("~" + prethodnaSlika));
                                    if (podaciOfajlu.Exists)
                                    {
                                        File.Delete(Server.MapPath("~" + prethodnaSlika));
                                    }

                                    FileUploadSlika.SaveAs(uploadFolder + novoIme);

                                }
                               
                            }


                            this.tabelaZaIzmenuSlika.Attributes["style"] = "display:none;";
                            this.GridViewUpravljanjeSlikama.Visible = true;
                            this.DropDownListGalerije.SelectedValue = this.DropDownListSlike.SelectedValue;
                            GridViewUpravljanjeSlikama.DataSource = rezultatUpdate.Niz;
                            GridViewUpravljanjeSlikama.DataBind();

                        }

                      


                    }
                    catch (Exception ex)
                    {

                    }
                    finally
                    {

                    }


              
               
         

           






        }

        protected void ButtonOtkazi_Click(object sender, EventArgs e)
        {
            this.tabelaZaIzmenuSlika.Attributes["style"] = "display:none;";
            this.GridViewUpravljanjeSlikama.Visible = true;

            
        }

        protected void ButtonUnos_Click(object sender, EventArgs e)
        {
            string uploadFolder = Server.MapPath("~/assets/images/slikeFilmova/");
            string zaBazuFolder = "/assets/images/slikeFilmova/";

            string celaputanjaZaBazu = "";


            if (!FileUploadUnosSlika.HasFile)
            {
                return;
            }



            string nazivSlike = TextBoxUnosSlikaNaziv.Text;
                    string fileName = FileUploadUnosSlika.PostedFile.FileName;
                    string novoIme = String.Format("{0}_{1}", DateTime.Now.ToString("ddMMyyyy"), fileName);
                    string tipFajla = FileUploadUnosSlika.PostedFile.ContentType;
                    int velicina = FileUploadUnosSlika.PostedFile.ContentLength;

                    celaputanjaZaBazu = zaBazuFolder + novoIme;

                    try
                    {


                        string korisnickoIme;

                        if (User.Identity.IsAuthenticated)
                            korisnickoIme = User.Identity.Name.ToString();
                        else
                            korisnickoIme = "No user identity available.";

                        OpSlikeInsert slikeInsert = new OpSlikeInsert();
                        slikeInsert.Slika = new Slike { NazivSlike = nazivSlike, IdGalerije = Int32.Parse(this.DropDownListUnosSlika.SelectedValue), DatumIzmene = DateTime.Now, DatumPostavljanja = DateTime.Now, Korisnik = korisnickoIme, PutanjaDoSlike = celaputanjaZaBazu };
                        OperationObject rezultatInsert = OperationManager.Singleton.executeOp(slikeInsert);
                        if (rezultatInsert != null && rezultatInsert.Niz != null && rezultatInsert.Success != false)
                        {
                            FileUploadUnosSlika.SaveAs(uploadFolder + novoIme);



                            this.tabelaZaIzmenuSlika.Attributes["style"] = "display:none;";
                            this.GridViewUpravljanjeSlikama.Visible = true;
                            this.DropDownListGalerije.SelectedValue = this.DropDownListUnosSlika.SelectedValue;
                            GridViewUpravljanjeSlikama.DataSource = rezultatInsert.Niz;
                            GridViewUpravljanjeSlikama.DataBind();

                        }

                       

                     


                    }
                    catch (Exception ex)
                    {

                    }
                    finally
                    {

                    }


                

          
        }

        
    }
}