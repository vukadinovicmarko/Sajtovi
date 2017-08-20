using MilankovDeo.DataLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MilankovDeo.BusinessLayer
{
    public class OpZanroviBase : Operation
    {
        public override OperationObject execute(DataLayer.aspLab2015Entities entities)
        {
            Zanrovi[] niz =
                (
                    from item in entities.Zanrovis
                    select item
                ).ToArray();
            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;
        }
    }

    public class OpZanroviSelectWhereNaziv : OpZanroviBase
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            Zanrovi[] niz =
                (
                    from item in entities.Zanrovis
                    where item.NazivZanra == PropertiZanrovi.NazivZanra
                    select item
                ).ToArray();
            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;
        }
        public Zanrovi PropertiZanrovi { get; set; }
    }

    
        
    
}
