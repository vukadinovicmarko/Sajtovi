using MilankovDeo.DataLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MilankovDeo.BusinessLayer
{
    public class OpKontaktBase : Operation
    {
        public override OperationObject execute(DataLayer.aspLab2015Entities entities)
        {
            Poruke[] niz =
                (
                    from item in entities.Porukes
                    select item
                ).ToArray();

            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;

        }


        public Poruke KontaktProperti { get; set; }
    }
    

    public class OpKontaktInsert : OpKontaktBase
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            entities.PorukeInsert
                (
                    this.KontaktProperti.NaslovPoruke,
                    this.KontaktProperti.emailKlijenta,
                    this.KontaktProperti.OpisPoruke
                );
            return base.execute(entities);
        }
    }
}
