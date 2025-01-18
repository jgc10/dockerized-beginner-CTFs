#!/bin/sh
part1="Q0lU"
part2="e2Ew"
part3="YjFl"
part4="YTBl"
part5="MTI3"
part6="OWE1"
part7="NDB9"
part8="Cg=="
encoded="${part1}${part2}${part3}${part4}${part5}${part6}${part7}${part8}"
decoded=$(echo "$encoded" | base64 --decode)
echo "$decoded"
