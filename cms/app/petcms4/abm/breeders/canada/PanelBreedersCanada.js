Ext.define('app.petcms4.abm.breeders.canada.PanelBreedersCanada', {
  extend: 'Ext.panel.Panel',
  layout: 'border',
  
  constructor: function(cnfg) {
      this.callParent(arguments);
      
      this.panForm=Ext.create('app.petcms4.abm.breeders.canada.FormBreedersCanada', {
        id: 'formBreedersCanadaId',	
        region: 'center'
      });     
      
      this.panBusqueda=Ext.create('app.petcms4.abm.breeders.canada.BusquedaBreedersCanada', {
        id: 'busquedaBreedersCanadaId', 	
        region: 'west',
        width: 350
      });   
      
      
      this.panSuperior= new Ext.Container({
          layout: 'border',
          region: 'north',
          height: 450,
          items: [this.panForm, this.panBusqueda]
      });   
      
      this.panGrilla = Ext.create('app.petcms4.abm.breeders.canada.GrillaBreedersCanada', {
        id: 'grillaBreedersCanadaId',	
        region: 'center',
//        height : 150,
      });  
      
      this.add(this.panSuperior);
      this.add( this.panGrilla);      
      abmIza(this.panGrilla, this.panForm, this.panBusqueda);
      
      this.initConfig(cnfg);
  },
  
  config: {
        panForm: {},
        panBusqueda: {},
        panGrilla : {},
        panSuperior : {}
  }, 
});