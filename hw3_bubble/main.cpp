#include <iostream>
using namespace std;
/* run this program using the console pauser or add your own getch, system("pause") or input loop */

int main(int argc, char** argv) {
	int array[6]={80,90,40,70,60,50};
	int i,j,k,temp;
	for(i=0;i<6;i++)
	{
		for(k=0;k<6;k++){
			cout<<array[k]<<" ";
		}
		cout<<endl;
		for(j=0;j<(5-i);j++)
		{
			if(array[j]>array[j+1])
			{
				temp=array[j+1];
				array[j+1]=array[j];
				array[j]=temp;
			}
		}
			
	}
	
	
	
	return 0;
}
