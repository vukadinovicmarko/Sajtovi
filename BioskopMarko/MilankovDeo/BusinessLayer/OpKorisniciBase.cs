using MilankovDeo.DataLayer;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MilankovDeo.BusinessLayer
{
    public class OpKorisniciBase : Operation
    {
        public override OperationObject execute(DataLayer.aspLab2015Entities entities)
        {
            OpKorisniciDbItemSlozenaSelekcija[] niz =
                    (
                        from item in entities.aspnet_Users
                        join aplikacija in entities.aspnet_Applications
                        on item.ApplicationId equals aplikacija.ApplicationId
                        join korisniciuloge in entities.vw_aspnet_UsersInRoles
                        on item.UserId equals korisniciuloge.UserId
                        join uloga in entities.aspnet_Roles
                        on korisniciuloge.RoleId equals uloga.RoleId
                        where aplikacija.ApplicationName == "BioskopMarko"
                        select new OpKorisniciDbItemSlozenaSelekcija
                        {
                            NazivAplikacije = aplikacija.ApplicationName,
                            KorisnickoIme = item.UserName,
                            UserId = item.UserId,
                            PoslednjiputAktivan = item.LastActivityDate,
                            NazivUloge = uloga.RoleName
                        }

                    ).ToArray();

            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;
        }


        public aspnet_Users PropertiKorisnici { get;set; }
    }


    public class OpKorisniciSelectWhereId : OpKorisniciBase
    {
        public override OperationObject execute(aspLab2015Entities entities)
        {
            aspnet_Users[] niz =
                (
                    from item in entities.aspnet_Users
                    where item.UserId == this.PropertiKorisnici.UserId
                    select item
                ).ToArray();
            OperationObject rezultat = new OperationObject();
            rezultat.Niz = niz;
            rezultat.Success = true;
            return rezultat;

        }
    }

    public class OpKorisniciDbItemSlozenaSelekcija
    {
        public Guid UserId { get; set; }
        public string KorisnickoIme { get; set; }
        public string NazivAplikacije { get; set; }
        public string NazivUloge { get; set; }
        public DateTime PoslednjiputAktivan { get; set; }
        
    }
    
}
