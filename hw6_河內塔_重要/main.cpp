#include <iostream>
using namespace std;
/* run this program using the console pauser or add your own getch, system("pause") or input loop */
//�ؼ�:A�������C 
void Tower(int,char,char,char);
int count=0;
int main(int argc, char** argv) {
	int n;
	cout<<"�п�J�e���𰪫�:"; 
	cin>>n;
	Tower(n,'A','B','C');
	cout<<"����F"<<count<<"��"<<endl;
	return 0;
}
void Tower(int n,char a,char b, char c){
	if(n==1)
	{
		count++;
		cout<<count<<":���ʲ�"<<n<<"�Ӷ�L"<<"��"<<a<<"��"<<c<<endl;
	}	 
	else
	{
		Tower(n-1,a,c,b);
		count++;
		cout<<count<<":���ʲ�"<<n<<"�Ӷ�L"<<"��"<<a<<"��"<<c<<endl;
		Tower(n-1,b,a,c);
	}
}
