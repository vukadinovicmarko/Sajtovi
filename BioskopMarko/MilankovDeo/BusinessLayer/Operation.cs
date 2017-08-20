using MilankovDeo.DataLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MilankovDeo.BusinessLayer
{
    public abstract class Operation
    {
        public abstract OperationObject execute(aspLab2015Entities entities);
    }
}
