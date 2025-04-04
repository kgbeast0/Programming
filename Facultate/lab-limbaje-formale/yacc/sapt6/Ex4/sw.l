%option noyywrap
alpha [AZaz]
digit [09]
%%
[ \t\n]
switch return SWITCH;
case return CASE;
break return BREAK;
default return DEFAULT;
{digit}+ return NUM;
{alpha}({alpha}|{digit})* return ID;
"<=" return LE;
">=" return GE;
"==" return EQ;
"!=" return NE;
"||" return OR;
"&&" return AND;
. return yytext[0];
%%