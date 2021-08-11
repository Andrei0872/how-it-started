//selectez inputurile
        var elements = document.querySelectorAll('.vector');
       // alert(elements[0].value);
//        obtinem laturile 
        var raspuns = document.getElementById("response");
           var prelucrare = function(array) {
           
//               obtinem lungimea vectorului 
                var len = array.split(",").length;
               
//               obtinem media aritmetica 
//               map - transform elementele din string in int 
//               reduce - fac suma elementelor 
//                        a - acumulator
//                        b - elementul curent 
               var temp = array.split(",").map(item => parseInt(item,10)).reduce((a,b) => a+b,0)/len;
               
//               returnam ce am obtinnut 
                return temp.toFixed(2);
               
        };
        
        var a = prelucrare(elements[0].value),
            b = prelucrare(elements[1].value),
            c = prelucrare(elements[2].value);
      
        console.log(a);
       console.log(b);
       console.log(c);
        
        var pitagora = function (a,b,c) {
            return (a*a + b*b == c*c) ? true:false;
        }
        
        //vedem daca se poate obtine un triunghi
       
        
      if(a+b >=c || a+c>=b || b+c>=a) {
          
          if(a == b && b ==c ) {
              raspuns.innerHTML = "echilateral";
          }
          else if( a == b || b==c || a==c) {
                    
              raspuns.innerHTML = "isoscel";
          }
          else  if(pitagora(a,b,c) || pitagora(a,c,b) || pitagora(b,c,a)) {
                        if(a==b || b==c || a==c ) {raspuns.innerHTML = "dreptunghic isoscel";}
                        else {
                            raspuns.innerHTML = "dreptunghic";
                        }
                    }
          else if(a==b || b==c || a==c) {
              raspuns.innerHTML = "isoscel";
          }
          else {
              raspuns.innerHTML = "scalen";
          }
          
      } else {
          raspuns.innerHTML = "nu poate forma un triunghi";
      }
         