using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace MilankovDeo.BusinessLayer
{
    public class OperationObject
    {
        public bool Success { get; set; }

        private string message;

        public string Message
        {
            get { return message; }
            set { message = value; }
        }

        public Object Niz { get; set; }

        public int AktuelniID { get; set; }
    }
}
