function UsuConfig (izen,backg,navbackg){
    this.izen =  izen;
    this.backg = backg;
    this.nav = navbackg;
        
        getIzen=function(){
            return this.izen;
        }

        this.getBackg=function(){
            return this.backg;
        }
        this.navBackg=function(){
            return this.izen;
        }
        this.setAll=function(izenberri,Backberri,navbackgBerri){
            setBackg(izenberri);
            setIzen(Backberri);
            setNavBackg(navbackgBerri);
        };
     
        this.setBackg=function(izenberri){
            this.izen = izenberri;
        }
        
        this.setIzen=function(Backberri){
            this.backg = Backberri;
        }
        this.setNavBackg=function(navbackgBerri){
            this.backg = navbackgBerri;
        }

        this.erakutsi=function(){
            var texto=  "izena:"+this.getIzena()+" icono:"+this.getIcon()+" Kolore:"+this.getBackg();
            return texto;
        }
  
    
    }