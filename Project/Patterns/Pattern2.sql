select not exists (select drinker.name, drinker.state, frequents.name, frequents.barName, bars.barName, bars.state,
  case when (drinker.state = (bars.state)) 
    then 'TRUE'
    else 'FALSE'
  end as peep
from drinker, bars, frequents
where frequents.barName = bars.barName and frequents.name = drinker.name
having peep = 'false');