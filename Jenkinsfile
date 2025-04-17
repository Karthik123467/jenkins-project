pipeline {
    agent any

    environment {
        COMPOSE_FILE = 'docker-compose.yml'
    }

    triggers {
        githubPush() // auto-trigger on push
    }

    stages {
        stage('Clone Repository') {
            steps {
                git branch: 'main', url: 'https://github.com/Karthik123467/jenkins-project'
            }
        }

        stage('Rebuild and Start Containers') {
            steps {
                sh 'docker-compose down || true'
                sh 'docker-compose up -d --build'
            }
        }

        stage('Verify Containers') {
            steps {
                sh 'docker ps'
            }
        }

        stage('Test PHP') {
            steps {
                sh 'curl -f http://localhost:8081 || echo "PHP App Failed!"'
            }
        }
    }
}



