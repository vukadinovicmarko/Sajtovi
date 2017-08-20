using MilankovDeo.DataLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MilankovDeo.BusinessLayer
{
    public class OpMembershipBase : Operation
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
 	        aspnet_Users[] niz = 
                    (
                        from item in entities.aspnet_Users
                        select item
                    ).ToArray();

            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;


        }
    }
    public class OpMemberSlozeniSelect : Operation
    {

        public override OperationObject execute(aspLab2015Entities entities)
        {
            OpMemberDbItemSlozenaSelekcija[] niz =
                    (
                        from item in entities.aspnet_Users
                        join aplikacija in entities.aspnet_Applications
                        on item.ApplicationId equals aplikacija.ApplicationId
                        join korisnikuloga in entities.vw_aspnet_UsersInRoles
                        on item.UserId equals korisnikuloga.UserId
                        join uloga in entities.aspnet_Roles
                        on korisnikuloga.RoleId equals uloga.RoleId
                        where aplikacija.ApplicationName == "BioskopMarko"
                        select new OpMemberDbItemSlozenaSelekcija
                            {
                                NazivAplikacije = aplikacija.ApplicationName,
                                KorisnickoIme = item.UserName,
                                NazivUloge =  uloga.RoleName,
                                PoslednjiputAktivan = item.LastActivityDate
                            }
                            
                    ).ToArray();

            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;
        }
    }

    public class OpMemberDbItemSlozenaSelekcija
    {
        
        public string KorisnickoIme { get; set; }
        public string NazivAplikacije { get; set; }
        public string NazivUloge { get; set; }
        public DateTime PoslednjiputAktivan { get; set; }
    }


}
