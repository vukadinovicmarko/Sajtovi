using MilankovDeo.BusinessLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace BioskopMarko
{
    public partial class Default : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
          
                OpFilmoviSelect select = new OpFilmoviSelect();
                OperationObject rezultat = OperationManager.Singleton.executeOp(select);

                sortiranoPoOceni.DataSource = rezultat.Niz;
                sortiranoPoOceni.DataBind();
          
        }
    }
}