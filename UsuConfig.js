function UsuConfig (izen,backg,navbackg){
    this.izen =  izen;
    this.backg = backg;
    this.navbackg = navbackg;
        
        this.getIzen=function(){
            return this.izen;
        };

        this.getBackg=function(){
            return this.backg;
        };
        this.getNavBackg=function(){
            return this.navbackg;
        };
       
        this.setBackg= function(Backberri){
            this.backg = Backberri;
        };
        this.setIzen= function(izenberri){
            this.izen = izenberri;
        };
        
      
        this.setNavBackg=function(navbackgBerri){
            this.navbackg = navbackgBerri;
        };

        this.erakutsi=function(){
            var texto=  "izena:"+this.getIzena()+" icono:"+this.getIcon()+" Kolore:"+this.getBackg();
            return texto;
        };
        this.setAll=function(izenberri,Backberri,navbackgBerri){
            this.setBackg(Backberri);
            this.setIzen(izenberri);
             this.setNavBackg(navbackgBerri);
         };
    
    }