%option noyywrap

%{
int postiveno=0;
int negtiveno=0;
int positivefractions=0;
int negativefractions=0;
%}
DIGIT [0-9]
%%
\+?{DIGIT}+ postiveno++;
-{DIGIT}+ negtiveno++;
\+?{DIGIT}*\.{DIGIT}+ positivefractions++;
-{DIGIT}*\.{DIGIT}+ negativefractions++;
. ;
%%
int main()
{
yylex();
printf("\nNo. of positive numbers: %d",postiveno);
printf("\nNo. of Negative numbers: %d",negtiveno);
printf("\nNo. of Positive fractions: %d",positivefractions);
printf("\nNo. of Negative fractions: %d\n",negativefractions);
}