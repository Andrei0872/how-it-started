// Written at: 2 ian 2018

#include <iostream>
#include <cstring>
using std::cin;
using std::cout;
using std::endl;

int main()
{
    char cuv[50], voc[11]="AaEeIiOoUu", *p;//10 + '\0';
    cout<<"citirea cuvantului : \n";
    cin.getline(cuv,50);
    for(int i=0;i<10;i++)
    {
        p=strchr(cuv,voc[i]);
        int ok=0;
            while(p!=NULL)
            {   ok=1;
                int x=p-cuv; //pozitia vocalei
                strcpy(cuv+x,cuv+x+1);
                p=strchr(cuv,voc[i]); // in s se cauta acea vocala //p+1!
            }
            if(ok==1) cout<<cuv<<endl;
        p=strchr(cuv,voc[i]);

    }
    return 0;
}
//nu prea bine a iesit!
