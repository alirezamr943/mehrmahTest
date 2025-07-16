
echo "⏳ Waiting for database to be ready (TCP)..."
./wait-for db:3306
echo "✅ DB Port is open"
sleep 5


echo "🚀 Running migrations..."
# Retry loop
until php artisan migrate --force; do
  echo "❌ Migration failed — waiting and retrying in 5s..."
  sleep 5
done

echo "📦 Starting PHP-FPM server..."
exec php-fpm
