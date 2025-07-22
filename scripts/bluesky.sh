#!/bin/zsh

# Script to collect data
# and put the data into outputfile

CWD=$(dirname $0)
CACHEDIR="$CWD/cache/"
OUTPUT_FILE="${CACHEDIR}bluesky.txt"
SEPARATOR=' = '
SERIAL=$(/usr/libexec/PlistBuddy -c "print :'serial'" /var/bluesky/settings.plist)
VERSION=$(/usr/libexec/PlistBuddy -c "print :'version'" /var/bluesky/settings.plist)
#TEST FOR VNCOnlyLocal
if defaults read /Library/Preferences/com.apple.RemoteManagement.plist VNCOnlyLocalConnections
&> /dev/null; then
VNCLOCALONLY="0"
else
VNCLOCALONLY=$(defaults read /Library/Preferences/com.apple.RemoteManagement.plist VNCOnlyLocalConnections)
fi
#END TEST for VNCOnlyLocal
#TEST FOR PASSWORDauth
if grep -iqE '^\s*#?\s*PasswordAuthentication\b.*\byes\s*$' /etc/ssh/ssh_config; then
    PASSWORDAUTH="1"
elif grep -iqE '^\s*#?\s*PasswordAuthentication\b.*\bno\s*$' /etc/ssh/ssh_config; then
    PASSWORDAUTH="0"
fi
#END TEST FOR PASSWORDauth

# Test for BlueSky settings.plist exists
if [ -f "/var/bluesky/settings.plist" ]; then

# Output data here
echo "version${SEPARATOR}$VERSION" > ${OUTPUT_FILE}
echo "serial${SEPARATOR}$SERIAL" >> ${OUTPUT_FILE}
echo "vnclocalonly${SEPARATOR}$VNCLOCALONLY" >> ${OUTPUT_FILE}
echo "passwordauth${SEPARATOR}$PASSWORDAUTH" >> ${OUTPUT_FILE}
# END Output data

else
# There is no settings.plist so Remove the output file
rm -rf $OUTPUT_FILE
fi
