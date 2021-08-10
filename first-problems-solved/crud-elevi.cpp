// Written at: 10 ian 2018

#include <iostream>
#include <cstring>
using namespace std;
const int NMAX=31;
typedef struct{
    char nume[31], prenume[31];
    float medie;
} elev;
elev clasa[NMAX];
int n;

void creare(){
    int i;
    do{
        cout<<"Dati numarul de elevi= "; cin>>n;
    }while(n<=0 || n>=NMAX);
    for(i=0; i<n; i++){
        cout<<"Nume elevului nr."<<i+1<<": ";cin>>clasa[i].nume;
        cout<<"Prenume elevului nr."<<i+1<<": ";cin>>clasa[i].prenume;
        cout<<"Media elevului "<<clasa[i].nume<<" "<<clasa[i].prenume<<" : ";cin>>clasa[i].medie;
    }
}

void afisare(){
    int i;
    if(n>0){
        cout<<"Elevii sunt: "<<endl;
        for(i=0; i<n; i++)
            cout<<clasa[i].nume<<" "<<clasa[i].prenume<<"\t"<<clasa[i].medie<<endl;
        cout<<endl;
    }
    else cout<<"Lista este vida!"<<endl;
}

void caut_elev(){
    char nume_c[31], pren_c[31];
    int i,gasit;
    float m;
    cout<<"Dati numele elevului pe care il cautati: "; cin>>nume_c;
    cout<<"Dati prenumele elevului pe care il cautati: "; cin>>pren_c;
    gasit=0;
    for(i=0; i<n; i++)
        if((strcmp(clasa[i].nume,nume_c)==0) && (strcmp(clasa[i].prenume,pren_c)==0)){
            gasit=1;
            m=clasa[i].medie;
        }
    if(gasit)
        cout<<"Elevul "<<nume_c<<" "<<pren_c<<" este in clasa si are media "<<m<<endl;
    else cout<<"Nu exista un astfel de elev cu acest nume in clasa!"<<endl;
}

void inserare(){
    int k,i;
    char nume_nou[31], pren_nou[31];
    float medie_noua;
    cout<<"Dati numele noului elev: "; cin>>nume_nou;
    cout<<"Dati prenumele noului elev: "; cin>>pren_nou;
    cout<<"Dati media noului elev: "; cin>>medie_noua;
    cout<<"Dati pozitia pe care se face inserarea: "; cin>>k;
    if(k>=1 && k<=n+1){
        for(i=n-1; i>=k; i--) clasa[i+1]=clasa[i];
        strcpy(clasa[k].nume,nume_nou);
        strcpy(clasa[k].prenume,pren_nou);
        clasa[k].medie=medie_noua;
        n++;
    }
    else cout<<"Nu se poate face inserarea!"<<endl;
}

void stergere(){
    int k,i;
    cout<<"Dati pozitia de pe care se sterge elevul: ";cin>>k;
    if(k>=1 && k<=n){
        for(i=k; i<n-1; i++) clasa[i]= clasa[i+1];
        n--;
    }
    else cout<<"Nu se poate face stergerea!"<<endl;
}

int main(){
    int c;
    do{
        cout<<"1.Creare"<<endl;
        cout<<"2.Afisare"<<endl;
        cout<<"3.Verificaredaca un elev este sau nu in clasa"<<endl;
        cout<<"4.Inserare unui nou elev"<<endl;
        cout<<"5.Stergerea unui elev din clasa"<<endl;
        cout<<"0.Revenirea in program"<<endl;
        cout<<"Alege: ";cin>>c;
        switch(c){
            case 1: creare(); break;
            case 2: afisare(); break;
            case 3: caut_elev(); break;
            case 4: inserare(); break;
            case 5: stergere(); break;
        }
    }while(c!=0);
    return 0;
}
