#include <iostream>
using namespace std;
/* run this program using the console pauser or add your own getch, system("pause") or input loop */

int main(int argc, char** argv) {
	//99乘法
	int f=1;//1
	int s=1;//2
	int ans=0;
	int i=0;
	int j=0;
	for(i=0;i<9;i++){
	for(j=0;j<9;j++){
		ans=f*s;
		cout << f<<"*"<< s <<"="<<ans <<" "; 
		s++;
	}
	cout<<endl;
	f++;
	s=1;
	}
	return 0;
}
