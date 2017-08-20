<%@ Page Title="" Language="C#" MasterPageFile="~/MarkoMaster.Master" AutoEventWireup="true" CodeBehind="Galerija.aspx.cs" Inherits="BioskopMarko.Galerija" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolderLevo" runat="server">
    <div class="divSaGalerijama col-lg-2">

 <asp:ListView ID="ListViewIzborGalerije" runat="server">
			<ItemTemplate>
                      
				<div class="lepoUredjenoGalerije">
                    <h3><%# Eval("NazivGalerije") %></h3>
					<a href='Galerija.aspx?strana=0&idGalerije=<%# Eval("IdGalerije") %>'>
							<img data-lightbox='image-1' src='<%# Eval("PutanjaDoSlike") %>' alt='<%# Eval("NazivGalerije") %>' class='galerijaSvakaSlikaPonaosobGalerije' height='200' width='200'  title='<%# Eval("NazivGalerije") %>'/>
					</a>	
				    
                </div>
			</ItemTemplate>
        </asp:ListView>


    </div>
    <div class="divGalerija col-lg-10 col-lg-offset-0">
        <h4 id="nazivTrenutneGalerije" runat="server"></h4>
        <asp:ListView ID="ListViewGalerija" runat="server">
			<ItemTemplate>

                      
				<div class="lepoUredjeno">
					<a href='<%# Eval("PutanjaDoSlike") %>' data-lightbox='image-1' data-title='<%# Eval("NazivSlike") %>'>
							<img data-lightbox='image-1' src='<%# Eval("PutanjaDoSlike") %>' alt='<%# Eval("NazivSlike") %>' class='galerijaSvakaSlikaPonaosob' height='200' width='200'  title='<%# Eval("NazivSlike") %>'/>
					</a>	
				    <p><%# Eval("NazivSlike") %></p>
                </div>
			</ItemTemplate>
        </asp:ListView>
        

       
          
	</div>
    <div class="cisti"></div>
     <div id="galerijaStranicenje" runat="server"></div>
</asp:Content>
