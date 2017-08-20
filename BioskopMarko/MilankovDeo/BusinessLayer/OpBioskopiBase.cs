using MilankovDeo.DataLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MilankovDeo.BusinessLayer
{
    public class OpBioskopiBase : Operation
    {
        public override OperationObject execute(DataLayer.aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();
            Bioskopi[] niz =
                (
                    from item in entiteti.Bioskopis
                    select item
                ).ToArray();

            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;
        }

        
    }

    public class OpBioskopiSelect : OpBioskopiBase
    {

    }

    public class OpBisokopiSelectWhereId : Operation
    {

        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspLab2015Entities entiteti = new aspLab2015Entities();
            Bioskopi[] niz =
                (
                    from item in entiteti.Bioskopis
                    where item.NazivBioskopa == this.PropertiBioskopi.NazivBioskopa 
                    select item
                ).ToArray();
            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;
        }

        public Bioskopi PropertiBioskopi { get; set; }
    }

    public class BioskopiDbItemSelekcija
    {
        public int IdBisokopa { get; set; }
    }
}
