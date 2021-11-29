#include <iostream>
using namespace std;
/* run this program using the console pauser or add your own getch, system("pause") or input loop */
//目標:A全部放到C 
void Tower(int,char,char,char);
int count=0;
int main(int argc, char** argv) {
	int n;
	cout<<"請輸入河內塔高度:"; 
	cin>>n;
	Tower(n,'A','B','C');
	cout<<"執行了"<<count<<"次"<<endl;
	return 0;
}
void Tower(int n,char a,char b, char c){
	if(n==1)
	{
		count++;
		cout<<count<<":移動第"<<n<<"個圓盤"<<"由"<<a<<"到"<<c<<endl;
	}	 
	else
	{
		Tower(n-1,a,c,b);
		count++;
		cout<<count<<":移動第"<<n<<"個圓盤"<<"由"<<a<<"到"<<c<<endl;
		Tower(n-1,b,a,c);
	}
}
