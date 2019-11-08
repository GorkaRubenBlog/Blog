function UsuConfig(icon, backg, izen){
    this.icon = icon;
    this.izen =  izen;
    this.backg = backg;
     
        this.getIcon=function(){
            return this.icon;
        }
        this.getIzen=function(){
            return this.izen;

        }

        this.getBackg=function(){
            return this.backg;

        }
        
        this.setIcon=function(IconBerri){
            this.icon = IconBerri;

        }
        
        this.setBackg=function(izenberri){
            this.izen = izenberri;

        }
        
        this.setIzen=function(Backberri){
            this.backg = Backberri;

        }
        this.erakutsi=function(){
            var texto=  "izena:"+this.getIzena()+" icono:"+this.getIcon()+" Kolore:"+this.getBackg();
            return texto;
        }
  
    
    }