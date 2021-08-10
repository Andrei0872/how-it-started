// Written at: 15 mar 2018

#include <bits/stdc++.h>
#define NMAX 505
using namespace std;
ifstream f("rover.in");
ofstream g("rover.out");
deque < pair <int, int> > coada;
queue < pair <int, int > > q;
const int dx[4] = {-1,1,0,0};
const int dy [4] = {0,0,-1,1};
int n,G,v,a[NMAX][NMAX], b[NMAX][NMAX];
void task1() {
memset(b,-1,sizeof(b));
int d, cx,cy,x1,y1;
b[1][1]=0; ///se pleaca de la primul element
coada.push_back(make_pair(1,1));
while(!coada.empty()) {
    cx = coada.front().first;
    cy = coada.front().second;
    coada.pop_front();
    for(d=0;d<4;d++) {
        x1 = cx + dx[d];
        y1 = cy + dy[d];
        ///verificam daca vecinii sunt ok
        ///b[x1][y1]==-1 --> adica nu roverul n a trecut pe acolo
        if(y1>=1 && y1<=n && x1>=1 && x1<=n && b[x1][y1]==-1) {
            ///ce e mai mic decat greutatea, trecem la finalul cozii
            if(a[x1][y1]<G) {
                ///+1
                b[x1][y1] = b[cx][cy]+1;
                coada.push_back(make_pair(x1,y1));
            }
            ///daca e ce trebuie, atunci vecinul va mosteni valoarea
            else {
                b[x1][y1] = b[cx][cy];
                ///si se adauga in FATA cozii
                coada.push_front(make_pair(x1,y1));
            }
        }
    }
}
 g << b[n][n];
}
/*
testam elemente ca fiind G, si verificam daca se ajunge la final cu bine
*/
int parcurgere(int g) {
int d, cx, cy, x1, y1;
memset(b,-1,sizeof(b));
b[1][1] = 0;
q.push(make_pair(1,1));
while(!q.empty()) {
    cx = q.front().first;
    cy = q.front().second;
    q.pop();
    for(d=0;d<4;d++) {
        x1 = cx + dx[d];
        y1= cy +dy[d];
        ///verificam daca vecinii sunt ok
        if(y1>=1 && y1<=n && x1>=1 && x1<=n && b[x1][y1]==-1) {
            if(a[x1][y1]>=g){
                b[x1][y1] = b[cx][cy] +1;
                q.push(make_pair(x1,y1));
            }
        }
    }
}
if(b[n][n]>=0) ///daca s a ajuns la final
     return 1;
else return 0;
}

int main()
{   int i,j;
    f >> v >> n;
    if(v==1) {f >> G;
    for(i=1;i<=n;i++)
        for(j=1;j<=n;j++)
            f  >> a[i][j];
        task1();
    }
    else {
            int st=0,dr,mid;
         for(i=1;i<=n;i++)
            for(j=1;j<=n;j++)
                f  >> a[i][j];
        dr=max(a[1][1],a[n][n]);
        while(st<dr) {
            mid  = (st+dr)/2;
            if(parcurgere(mid)==0 && parcurgere(mid+1)==0)
                dr = mid;
            else if(parcurgere(mid)==1 && parcurgere(mid+1)==0)
                st =dr;
            else if(parcurgere(mid)==1 && parcurgere(mid+1)==1)
                st = mid;
        }
         g << mid;
    }
}
