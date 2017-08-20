using MilankovDeo.DataLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MilankovDeo.BusinessLayer
{
    public class OpUlogeBase : Operation
    {
        public override OperationObject execute(DataLayer.aspLab2015Entities entities)
        {
            aspnet_Roles[] niz = 
                (
                    from item in entities.aspnet_Roles
                    join aplikacija in entities.aspnet_Applications
                    on item.ApplicationId equals aplikacija.ApplicationId
                    where aplikacija.ApplicationName == "BioskopMarko"
                    select item
                ).ToArray();
            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;
        }
    }
}
