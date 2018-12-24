select not exists (SELECT bars.openHours, bars.closeHours, bills3.time from bars, bills3
where bills3.barName = bars.barName and (time_to_sec(bars.closeHours)) < (time_to_sec(bars.openHours)) and (((time_to_sec(bars.closeHours) > time_to_sec(bills3.time)) and (time_to_sec(bars.openHours) < time_to_sec(bills3.time))) or ((time_to_sec(bars.closeHours) < time_to_sec(bills3.time)) and (time_to_sec(bars.openHours) > time_to_sec(bills3.time))))
union all
SELECT bars.openHours, bars.closeHours, bills3.time from bars, bills3
where bills3.barName = bars.barName and (time_to_sec(bars.closeHours)) >= (time_to_sec(bars.openHours)) and ((time_to_sec(bars.closeHours) < time_to_sec(bills3.time)) or (time_to_sec(bars.openHours) > time_to_sec(bills3.time))))
