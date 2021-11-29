#include <iostream>
using namespace std;
/* run this program using the console pauser or add your own getch, system("pause") or input loop */
int F(int);
int main(int argc, char** argv) {
	int a,i;
	cout<<"請輸入項數:";
	cin>>a;
	cout<<0<<" ";
	for(i=1;i<a;i++){
	cout<<F(i)<<" ";
	}

	//return 0;
}
int F(int n)
	{
	if( n==1 or n==2 )
        return 1;
    else
        return F(n-1)+F(n-2);
	}

