# This file should contain all the record creation needed to seed the database with its default values.
# The data can then be loaded with the rake db:seed (or created alongside the db with db:setup).
#
# Examples:
#
#   cities = City.create([{ name: 'Chicago' }, { name: 'Copenhagen' }])
#   Mayor.create(name: 'Emanuel', city: cities.first)
#
100.times do |i|
  Article.create(title: "Meditations", text: "Do your best to convince them. But act on your own, if justice requires it. If met with force, then fall back on acceptance and peaceability. Use the setback to practice other virtues. Remember that our efforts are subject to circumstances; you weren't aiming to do the impossible. Aiming to do what, then? To try. And you succeeded. What you set out to do is accomplished.")
end
