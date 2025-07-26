from django.db import models

class Game(models.Model):
    title = models.CharField(max_length=100)
    location = models.CharField(max_length=255)
    start_time = models.DateTimeField()

    def __str__(self):
        return f"{self.title} at {self.location}"
