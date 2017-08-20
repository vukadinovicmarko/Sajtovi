<%@ Page Title="" Language="C#" MasterPageFile="~/MarkoMaster.Master" AutoEventWireup="true" CodeBehind="Login.aspx.cs" Inherits="BioskopMarko.Login" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
    <style type="text/css">
    .auto-style1 {
        width: 172px;
    }
</style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolderLevo" runat="server">
    <div class="divLoginForma col-md-5 col-md-offset-0">
        
        <asp:Login ID="LoginForma" runat="server"  FailureText="Vaš pokušaj prijavljivanja nije bio uspešan. Molimo, pokušajte ponovo kasnije." LoginButtonText="Prijavi se" MembershipProvider="MojProvajder" PasswordLabelText="Lozinka : " PasswordRequiredErrorMessage="Polje &quot;Lozinka&quot; ne sme biti prazno" RememberMeText="Zapamti me za sledeći put." valid TitleText="Prijavljivanje" UserNameLabelText="Korisničko ime :" UserNameRequiredErrorMessage="Polje &quot;Korisničko ime&quot; ne sme biti prazno" CssClass="formaLogin" Height="250px" width="300px" LabelStyle-CssClass="loginLabel"  CheckBoxStyle-CssClass="loginCheckBox"  TextBoxStyle-CssClass="loginTextBox" LoginButtonStyle-Width="100" LoginButtonStyle-CssClass="loginDugme"  TitleTextStyle-CssClass="titlePrijavljivanje" ValidatorTextStyle-CssClass="red" FailureTextStyle-CssClass="red">
        </asp:Login>

        <asp:ValidationSummary ID="ValidationSummary1" CssClass="red" runat="server" />

    </div>
    <div class="divRegistracijaForma col-md-5 col-md-offset-2">
        <asp:CreateUserWizard ID="CreateUserWizard1" CssClass="formaLogin" runat="server" Width="400px" CreateUserButtonText="Registruj se"  CreateUserButtonStyle-CssClass="registracijaDugme" CreateUserButtonStyle-Width="150px" MembershipProvider="MojProvajder" >
<CreateUserButtonStyle CssClass="registracijaDugme" Width="150px"></CreateUserButtonStyle>
            <WizardSteps>
                <asp:CreateUserWizardStep ID="CreateUserWizardStep1" runat="server">
                    <ContentTemplate>
                        <table class="registracijaTabela">
                            <tr>
                                <td align="center" class="titleRegistrovanje" colspan="2">Registrujte se ovde sa novim nalogom</td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <asp:Label ID="UserNameLabel" runat="server" AssociatedControlID="UserName">User Name:</asp:Label>
                                </td>
                                <td class="registracijaTextBox">
                                    <asp:TextBox ID="UserName" runat="server"></asp:TextBox>
                                    <asp:RequiredFieldValidator ID="UserNameRequired" runat="server" ControlToValidate="UserName" CssClass="registracijaValidacija" ErrorMessage="User Name is required." ToolTip="User Name is required." ValidationGroup="CreateUserWizard1">*</asp:RequiredFieldValidator>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <asp:Label ID="PasswordLabel" runat="server" AssociatedControlID="Password">Password:</asp:Label>
                                </td>
                                <td class="registracijaTextBox">
                                    <asp:TextBox ID="Password" runat="server" TextMode="Password"></asp:TextBox>
                                    <asp:RequiredFieldValidator ID="PasswordRequired" runat="server" ControlToValidate="Password" CssClass="registracijaValidacija" ErrorMessage="Password is required." ToolTip="Password is required." ValidationGroup="CreateUserWizard1">*</asp:RequiredFieldValidator>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <asp:Label ID="ConfirmPasswordLabel" runat="server" AssociatedControlID="ConfirmPassword">Confirm Password:</asp:Label>
                                </td>
                                <td class="registracijaTextBox">
                                    <asp:TextBox ID="ConfirmPassword" runat="server" TextMode="Password"></asp:TextBox>
                                    <asp:RequiredFieldValidator ID="ConfirmPasswordRequired" CssClass="registracijaValidacija" runat="server" ControlToValidate="ConfirmPassword" ErrorMessage="Confirm Password is required." ToolTip="Confirm Password is required." ValidationGroup="CreateUserWizard1">*</asp:RequiredFieldValidator>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <asp:Label ID="EmailLabel" runat="server" AssociatedControlID="Email">E-mail:</asp:Label>
                                </td>
                                <td class="registracijaTextBox">
                                    <asp:TextBox ID="Email" runat="server"></asp:TextBox>
                                    <asp:RequiredFieldValidator ID="EmailRequired" CssClass="registracijaValidacija" runat="server" ControlToValidate="Email" ErrorMessage="E-mail is required." ToolTip="E-mail is required." ValidationGroup="CreateUserWizard1">*</asp:RequiredFieldValidator>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <asp:Label ID="QuestionLabel" runat="server" AssociatedControlID="Question">Security Question:</asp:Label>
                                </td>
                                <td class="registracijaTextBox">
                                    <asp:TextBox ID="Question" runat="server"></asp:TextBox>
                                    <asp:RequiredFieldValidator ID="QuestionRequired" CssClass="registracijaValidacija" runat="server" ControlToValidate="Question"  ErrorMessage="Security question is required." ToolTip="Security question is required." ValidationGroup="CreateUserWizard1">*</asp:RequiredFieldValidator>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <asp:Label ID="AnswerLabel" runat="server" AssociatedControlID="Answer">Security Answer:</asp:Label>
                                </td>
                                <td class="registracijaTextBox">
                                    <asp:TextBox ID="Answer" runat="server"></asp:TextBox>
                                    <asp:RequiredFieldValidator ID="AnswerRequired" runat="server" CssClass="registracijaValidacija" ControlToValidate="Answer" ErrorMessage="Security answer is required." ToolTip="Security answer is required." ValidationGroup="CreateUserWizard1">*</asp:RequiredFieldValidator>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="registracijaValidacija" colspan="2">
                                    <asp:CompareValidator ID="PasswordCompare" CssClass="registracijaValidacija"  runat="server" ControlToCompare="Password" ControlToValidate="ConfirmPassword" Display="Dynamic" ErrorMessage="The Password and Confirmation Password must match." ValidationGroup="CreateUserWizard1"></asp:CompareValidator>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"  class="registracijaValidacija" colspan="2">
                                    <asp:RegularExpressionValidator ID="RegularExpressionValidatorEmail" runat="server" CssClass="registracijaValidacija" ErrorMessage="Polje E-mail mora biti u pravilnom formatu" ControlToValidate="Email" ValidationGroup="CreateUserWizard1" ValidationExpression="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*"></asp:RegularExpressionValidator>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2" style="color:Red;">
                                    <asp:Literal ID="ErrorMessage" runat="server" EnableViewState="False"></asp:Literal>
                                </td>
                            </tr>
                        </table>
                    </ContentTemplate>
                </asp:CreateUserWizardStep>
                <asp:CompleteWizardStep ID="CompleteWizardStep1"  runat="server">
                </asp:CompleteWizardStep>
            </WizardSteps>
        </asp:CreateUserWizard>
        
    </div>
</asp:Content>
