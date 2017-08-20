using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace BioskopMarko
{
    public partial class Logout : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

            if (!this.User.Identity.IsAuthenticated)
                Response.Redirect("~/Default.aspx");

            FormsAuthentication.SignOut();

            Response.Redirect(FormsAuthentication.LoginUrl);
        }
    }
}