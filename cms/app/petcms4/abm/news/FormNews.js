Ext.define('app.petcms4.abm.news.FormNews', {
    extend: 'app.petcms4.abm.PanelFormCabeceraAbm',
    frame: true,
  	prefijo: 'formNews',
  	nombreElementoId: 'newsId',
  	urlAgregado:  Global.dirAplicacion + '/svc/conector/news.php/inserta',
  	urlModificacion: Global.dirAplicacion + '/svc/conector/news.php/actualiza',
  	urlBorrado: Global.dirAplicacion + '/svc/conector/news.php/borra',
  	items: [
      {xtype: 'hidden', name: 'newsId', id: 'newsId', itemId: 'newsId'},
      {fieldLabel: 'Title', xtype: 'textfield',  name: 'newsTitle', itemId: 'newsTitle', allowBlank: false, width: 550},
      {title: 'Encoded URL', xtype: 'fieldset', itemId: 'encoding', border: false, layout: 'column', border: true,
      	items: [
            {xtype: 'textfield',  name: 'urlEncoded', itemId: 'urlEncoded',  allowBlank: false, columnWidth: 0.8},
              {xtype: 'button', text: 'Encode', itemId: 'botEncodeUrl', columnWidth: 0.2,
            	listeners:{
          		click : function(  The, eOpts ){
          			var form= The.up('form');
          			var encoding = form.getComponent('encoding');
          			var url = form.getComponent('newsTitle').getValue();
          			var ueTxt = Utilities.codificaUrl(url);
          			encoding.getComponent('urlEncoded').setValue(ueTxt);
          		}	
          	}
	          }
      	]
      },
      {fieldLabel: 'Date', xtype: 'fecha', name: 'newsDate', itemId: 'newsDate', width: 200},
      {fieldLabel: 'Text', xtype: 'textarea',  name: 'newsText', itemId: 'newsText',  id: 'newsText', grow: false, width: 750, height: 230}, 
      {fieldLabel: 'Cut position', xtype: 'numberfield',  name: 'cutPosition', itemId: 'cutPosition', allowBlank: false, width: 200, allowDecimals: false},
      {fieldLabel: 'Source', xtype: 'textfield',  name: 'newsSource', itemId: 'newsSource',  id: 'newsSource', allowBlank: true, width: 420},
      {fieldLabel: 'Foto', xtype: 'button', text: 'Subir foto', itemId: 'botAceptar', ref: '../botAceptar', 
          listeners: {scope: this,  
            'click' :  function(){
              var win=muestraRemisionFotos('fotoNews',  Global.dirAplicacion + '/svc/conector/news.php/subeFoto');
              win.show();
            }//evento click
           }//listeners
      },//botón Aceptar        
    ],      
  	   
  	pueblaDatosEnForm : function(record){
      this.getComponent('newsId').setValue(record.id);
      this.getComponent('newsTitle').setValue(record.get('newsTitle'));
      this.getComponent('encoding').getComponent('urlEncoded').setValue(record.get('urlEncoded'));
      this.getComponent('newsDate').setValue(record.get('newsDate'));
      this.getComponent('newsSource').setValue(record.get('newsSource'));
      this.getComponent('newsText').setValue(record.get('newsText'));
      this.getComponent('cutPosition').setValue(record.get('cutPosition'));
  	},
  	   
  	pueblaFormEnRegistro : function(record){
  	  record.data['newsId']=  this.getComponent('newsId').getValue();
  	  record.data['newsTitle']=  this.getComponent('newsTitle').getValue();
  	  record.data['urlEncoded']=  this.getComponent('encoding').getComponent('urlEncoded').getValue();
  	  record.data['newsSource']=  this.getComponent('newsSource').getValue();
  	  record.data['newsDate']=  this.getComponent('newsDate').getValue();
  	  record.data['newsText']=  this.getComponent('newsText').getValue();
  	  record.data['cutPosition']=  this.getComponent('cutPosition').getValue();
  	},  	   
  	   
  	   validaHijo : function(muestraVentana){
  		   var mensaje=null;
  		   var valido=true;
  		   
  		   if (!this.getComponent('newsTitle').isValid()){
  			   valido=false;
  			   mensaje='The title is invalid';
  		   }
         
  		   
  		   if (!valido && muestraVentana){
  	           Ext.MessageBox.show({
  	               title: 'Field Validation',
  	               msg: mensaje,
  	               buttons: Ext.MessageBox.OK,
  	               icon: Ext.MessageBox.ERROR
  	           });
  		   }
  		   return valido;
  	   },

  
  
});













