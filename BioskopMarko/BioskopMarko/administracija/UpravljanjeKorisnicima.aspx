<%@ Page Title="" Language="C#" MasterPageFile="~/AdministracijaMaster.Master" AutoEventWireup="true" enableEventValidation="false" CodeBehind="UpravljanjeKorisnicima.aspx.cs" Inherits="BioskopMarko.administracija.UpravljanjeKorisnicima" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolderGore" runat="server">
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="ContentPlaceHolderDole" runat="server">
    <asp:GridView ID="GridViewKorisnici" runat="server" AutoGenerateColumns="False">
        <Columns>
            <asp:TemplateField HeaderText="Izmeni">
                <ItemTemplate>
                    <asp:Button ID="ButtonIzmeni" runat="server" OnClick="ButtonIzmeni_Click" CommandArgument='<%# Eval("UserId") %>' Text="Izmeni" />
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField  HeaderText="Obriši"></asp:TemplateField>
            <asp:BoundField DataField="NazivAplikacije" HeaderText="Korisničko ime" />
            <asp:BoundField DataField="KorisnickoIme" HeaderText="Naziv aplikacije" />
            <asp:BoundField DataField="PoslednjiputAktivan" HeaderText="Poslednji put Aktivan" />
        </Columns>
    </asp:GridView>
    

    <div class="divUpravljanjeKorisnicimaUpdateTabela">

        <table style="width: 100%;" class="UpravljanjeKorisnicimaUpdateTabela">
            <tr>
                <asp:HiddenField ID="sakrivenoPolje" runat="server" />
            </tr>
            <tr>
                
                <td><asp:TextBox ID="TextBoxKorisnickoIme" runat="server"></asp:TextBox></td>
            </tr>
            <tr>
                
                <td><asp:TextBox ID="TextBoxNazivAplikacije" ReadOnly="true" runat="server"></asp:TextBox></td>
            </tr>
             <tr>
                
                <td><asp:TextBox ID="TextBoxPoslednjiPutAktivan" ReadOnly="true" runat="server"></asp:TextBox></td>
            </tr>
            <tr>
                <td>
                    <asp:CheckBoxList ID="CheckBoxListKorisnici" runat="server"></asp:CheckBoxList>
                </td>
            </tr>

        </table>

    </div> 

</asp:Content>
