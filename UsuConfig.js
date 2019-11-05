function UsuConfig(icon, backg, izen){
    this.icon = ic;
    this.adina =  ad;
    this.izen =  iz;
    this.objektu = ikaski;
     
        this.getIzena=function(){
            return this.izena;
        }
        this.getAdina=function(){
            return this.adina;

        }

        }
        this. getIkaskide=function(){
            return this.objektu;

        }
        this.setIzena =function(izenberri){
             this.izena = izenberri;

        }
        this.setAdina =function(adinberri){
            this.adina = adinberri;

        }
        this.setEspezialitatea =function(espezialitatea){
             this.espezialitatea = espezialitatea;

        }
        this.setObjektu=function(objetuberri){
             this.objektu = objetuberri;

        }
        this.erakutsi=function(){
            var texto=  "izena:"+this.getIzena()+" adina:"+this.getAdina()+" espezialitatea:"+this.getEspezialitatea()+"ikaskidea:"+this.getIkaskide();
            return texto;
        }
        this.getikaskideIzena=function(){
            var ik = this.getIkaskide();
            var texto = ik.getikaskideIzena();
            return texto;
        }
    }
  