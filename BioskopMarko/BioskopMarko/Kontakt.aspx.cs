using MilankovDeo.BusinessLayer;
using MilankovDeo.DataLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace BioskopMarko
{
    public partial class Kontakt : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

            OpStranaKontaktSelectWhereAktivan stranaKontakt = new OpStranaKontaktSelectWhereAktivan();
            
            OperationObject rezultatStranaKontakt = OperationManager.Singleton.executeOp(stranaKontakt);

            if (rezultatStranaKontakt != null && rezultatStranaKontakt.Niz != null && rezultatStranaKontakt.Success != false)
            {


                StranaKontakt[] stranaNiz = rezultatStranaKontakt.Niz as StranaKontakt[];

                string glavniNaslovStraneKontakt = "";
                string glavniTekstStraneKontakt = "";
                for (int i = 0; i < stranaNiz.Length; i++)
                {
                    glavniNaslovStraneKontakt += stranaNiz[i].NaslovStraneKontakt;
                    glavniTekstStraneKontakt += stranaNiz[i].TekstStraneKontakt;
                }


                this.naslovStraneKontakt.InnerText = glavniNaslovStraneKontakt;
                this.tekstStraneKontakt.InnerText = glavniTekstStraneKontakt;

                string[] bioskopiDoradjeno = stranaNiz[0].Bioskopi.Split(',');

                string emailBioskopa = "";
                string telefonBioskopa = "";
                string svasta = "";

                for (int i = 0; i < bioskopiDoradjeno.Length; i++)
                {

                    
                
               
                    OpBisokopiSelectWhereId bioskopiId = new OpBisokopiSelectWhereId();
                    bioskopiId.PropertiBioskopi = new Bioskopi { NazivBioskopa = bioskopiDoradjeno[i] };

                    OperationObject rezultatBioskopiId = OperationManager.Singleton.executeOp(bioskopiId);

                    
                    Bioskopi[] bioskopiNiz = rezultatBioskopiId.Niz as Bioskopi[];

                    
                    for (int j = 0;j < bioskopiNiz.Length; j++)
                    {
                        if (rezultatBioskopiId != null && rezultatBioskopiId.Niz != null && rezultatBioskopiId.Success != false)
                        {

                            
                            
                            string gradBioskopa = bioskopiNiz[j].GradBioskopa;
                            string drzavaBioskopa = bioskopiNiz[j].DrzavaBioskopa;
                            emailBioskopa += "<p>" + bioskopiNiz[j].EmailBioskopa.ToString() + "</p>";
                            telefonBioskopa += "<p>" + bioskopiNiz[j].NazivBioskopa.ToString() + " : " + bioskopiNiz[j].TelefonBioskopa.ToString() + "</p>";
                            svasta += "<p  class='companyNameContact'>" + bioskopiNiz[j].NazivBioskopa + "</p>" + "<p>" + bioskopiNiz[j].UlicaBioskopa_ + " " + bioskopiNiz[j].BrojUliceBioskopa.ToString() + "</p>" + "<p>" + bioskopiNiz[j].GradBioskopa + "</p>" + "<p>" + bioskopiNiz[j].DrzavaBioskopa + "</p>" + "<hr style='border:1px dotted #ff4949'/>";
                            

                        }
                    }

                    this.svasta.InnerHtml = svasta;
                    this.divEmail.InnerHtml = emailBioskopa;
                    this.NazivBioskopaITelefon.InnerHtml = telefonBioskopa;
                   
                    
                }


            }










            if (this.User.Identity.IsAuthenticated)
            {
                MembershipUser mUser = Membership.GetUser();
                string email = mUser.Email;
                TextBoxEmail.Text = email;

                

                

            }




        }

        protected void ButtonKontakt_Click(object sender, EventArgs e)
        {

            string email = "";

            if (this.User.Identity.IsAuthenticated)
            {
                MembershipUser mUser = Membership.GetUser();
                 email = mUser.Email;
            }
            else
            {
                 email = TextBoxEmail.Text;
            }

            string naslov = TextBoxNaslov.Text;
            string poruka = TextBoxPoruka.Text;

            OpKontaktInsert insert = new OpKontaktInsert();
            insert.KontaktProperti = new Poruke { emailKlijenta = email, NaslovPoruke = naslov, OpisPoruke = poruka };

            OperationObject rezultatInserta = OperationManager.Singleton.executeOp(insert);
        }
    }
}