select not exists (select count(*),d,j from(
select a.item as d, b.item as j
from sells a, sells b, beers
where a.item != b.item and a.barname = b.barname and (a.price > b.price) and beers.beer = a.item 
group by a.item, b.item
union all
select  a.item as d, b.item as j
from sells a, sells b, beers
where a.item != b.item and a.barname = b.barname and (a.price < b.price) and beers.beer = b.item  
group by a.item, b.item) 
as p
group by d,j
having count(*) >1)