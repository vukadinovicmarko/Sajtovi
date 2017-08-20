using MilankovDeo.BusinessLayer;
using MilankovDeo.DataLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace BioskopMarko.administracija
{
    public partial class UpravljanjeKorisnicima : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            OpKorisniciBase op = new OpKorisniciBase();
            OperationObject rezultat = OperationManager.Singleton.executeOp(op);

            if (rezultat.Niz != null && rezultat.Niz != null && rezultat.Success != false)
            {
                this.GridViewKorisnici.DataSource = rezultat.Niz;
                this.GridViewKorisnici.DataBind();
            }

            

            
            
            
            
            

        }

        protected void ButtonIzmeni_Click(object sender, EventArgs e)
        {
            Button dugme = (Button) sender;
            Guid skrivenId = Guid.Parse(dugme.CommandArgument);
            this.sakrivenoPolje.Value = skrivenId.ToString();



            OpKorisniciSelectWhereId korisniciWhereId = new OpKorisniciSelectWhereId();
            korisniciWhereId.PropertiKorisnici = new aspnet_Users { UserId = skrivenId };

            OperationObject rezultat = OperationManager.Singleton.executeOp(korisniciWhereId);
            if (rezultat.Niz != null && rezultat != null && rezultat.Success != false)
            {
                aspnet_Users[] nizKorisnika = rezultat.Niz as aspnet_Users[];
                this.TextBoxKorisnickoIme.Text = nizKorisnika[0].UserName;
                this.TextBoxNazivAplikacije.Text = nizKorisnika[0].ApplicationId.ToString();
                this.TextBoxPoslednjiPutAktivan.Text = nizKorisnika[0].LastActivityDate.ToString();
            }


            OpUlogeBase opUloge = new OpUlogeBase();
            OperationObject rezultatUloge = OperationManager.Singleton.executeOp(opUloge);

            aspnet_Roles[] uloge = rezultatUloge.Niz as aspnet_Roles[];

            foreach (var item in uloge)
            {
                ListItem lista = new ListItem();
                lista.Text = item.RoleName;
                lista.Value = item.RoleId.ToString();
                CheckBoxListKorisnici.Items.Add(lista);
                CheckBoxListKorisnici.DataBind();

            }
        }
    }
}