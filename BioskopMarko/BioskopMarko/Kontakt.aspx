<%@ Page Title="" Language="C#" MasterPageFile="~/MarkoMaster.Master" AutoEventWireup="true" CodeBehind="Kontakt.aspx.cs" Inherits="BioskopMarko.Kontakt" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolderLevo" runat="server">
    <div class=" col-lg-7">
        <div class="kontaktDivGoreLevo col-lg-12 col-lg-offset-0">
            <h4 id="naslovStraneKontakt" runat="server"></h4>
            <hr style="border:1px dotted #ff4949"/>
            <p id="tekstStraneKontakt" runat="server"></p>
        </div>
        
        
   
    
        <div class="kontaktDiv col-lg-12 col-lg-offset-0">
            <legend class="legendaKontakt">Ostavite nam poruku</legend>
            
            
            <table class="tabelaKontakt table" style="width:100%;">
                <tr>
                    <td class="kontaktTabelaLevo">Email</td>
                    <td class="kontaktTabelaDesno"><asp:TextBox ID="TextBoxEmail" runat="server"></asp:TextBox>
                        <asp:RequiredFieldValidator ID="RequiredFieldValidatorEmail" runat="server" ControlToValidate="TextBoxEmail" ErrorMessage="Polje 'Email' ne sme biti prazno" CssClass="red">*</asp:RequiredFieldValidator>
                        <asp:RegularExpressionValidator ID="RegularExpressionValidatorEmail" runat="server" ControlToValidate="TextBoxEmail" ErrorMessage="Polje 'Email' mora imati odgovarajuću formu" ValidationExpression="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*" CssClass="red" >*</asp:RegularExpressionValidator>
                    </td>
                
                </tr>
                <tr>
                    <td class="kontaktTabelaLevo">Naslov</td>
                    <td class="kontaktTabelaDesno"><asp:TextBox ID="TextBoxNaslov" runat="server"></asp:TextBox>
                        <asp:RequiredFieldValidator ID="RequiredFieldValidatorNaslov" runat="server" ControlToValidate="TextBoxNaslov" ErrorMessage="Polje 'Naslov' ne sme biti prazno" CssClass="red">*</asp:RequiredFieldValidator>
                        <asp:RegularExpressionValidator ID="RegularExpressionValidatorNaslov" runat="server" ControlToValidate="TextBoxNaslov" CssClass="red" ErrorMessage="Polje 'Naslov' mora minimum 3 slova" ValidationExpression="[A-z]{3,}">*</asp:RegularExpressionValidator>
                    </td>
                
                </tr>

                <tr>
                    <td class="kontaktTabelaLevo">Poruka</td>
                    <td class="kontaktTabelaDesno"> <asp:TextBox ID="TextBoxPoruka" runat="server" TextMode="MultiLine" Columns="55" Rows="10" Width="350px" ></asp:TextBox>
                        <asp:RequiredFieldValidator ID="RequiredFieldValidatorPoruka" runat="server" ControlToValidate="TextBoxPoruka" ErrorMessage="Polje 'Poruka' ne sme biti prazno" CssClass="red">*</asp:RequiredFieldValidator>
                        <asp:RegularExpressionValidator ID="RegularExpressionValidatorPoruka" runat="server" ControlToValidate="TextBoxPoruka"  ErrorMessage="Polje 'Poruka' mora imati minimum 10 slova" ValidationExpression="[a-zA-Z'.\s](0-9){10,}" CssClass="red">*</asp:RegularExpressionValidator>
                    </td>
               
                </tr>
                <tr>
                    <td colspan="2">
                        <asp:Button ID="ButtonKontakt" runat="server" Text="Pošаlji poruku" OnClick="ButtonKontakt_Click" />
                    </td>
                </tr>
            
                <tr>
                    <td colspan="2">
                        <asp:ValidationSummary ID="ValidationSummary1" runat="server" CssClass="red" />
                    </td>
                </tr>
            
            </table>

        </div>
    </div>
    <div class="kontaktDivGoreDesno col-lg-4 col-lg-offset-1">
        <h4>Adrese i telefoni</h4>
       
       
        <div id="svasta" class="adreseKontakt" runat="server">

        </div>
        
        <div id="NazivBioskopaITelefon" class="telefoniKontakt" runat="server">

        </div>
        
        
        <h4>Email-ovi</h4>
        <div id="divEmail" class="emailoviKontakt" runat="server">

        </div>
        
          
    </div>
</asp:Content>
